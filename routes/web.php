<?php

use App\Http\Middleware\IsTutor;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Month;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Services\ApiVideo;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'recent' => Course::whereHas('lessons')->with(['lessons'])->orderBy('created_at')->limit(3)->get()
    ]);
})->name('home');

Route::get('/pricing', function () {
    return Inertia::render('Pricing');
});

Route::get('/privacy', function () {
    return Inertia::render('PrivacyPolicy', [
        'privacy' => File::get(resource_path('markdown/privacy.md'))
    ]);
});

Route::get('/terms', function () {
    return Inertia::render('TermsOfService', [
        'terms' => File::get(resource_path('markdown/terms.md'))
    ]);
});

Route::resource('courses', \App\Http\Controllers\CourseController::class)->only(['index', 'show']);
Route::resource('skills', \App\Http\Controllers\SkillController::class)->only(['index']);
Route::resource('lessons', \App\Http\Controllers\LessonController::class)->only(['show']);
Route::resource('months', \App\Http\Controllers\MonthController::class)->only(['show']);

Route::get('/tutors', function () {
    return Inertia::render('Tutor/Index', [
        'tutors' => \App\Models\Tutor::paginate(10),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        $currentMonth = Month
            ::whereBetween('started_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->with([
                'payments' => function ($q) {
                    $q->where('user_id', request()->user()->id);
                },
                'lessons.course'
            ])
            ->first();
        return Inertia::render('Dashboard', [
            'currentMonth' => $currentMonth,
            'months' => Month::with([
                'payments' => function ($q) {
                    $q->where('user_id', request()->user()->id);
                }
            ])->orderBy('started_at', 'DESC')->get(),
        ]);
    })->name('dashboard');

    Route::post('/basket', function (Request $request) {
        $month = Month::where('id', $request->month_id)->first();
        Payment::create([
            'user_id' => $request->user()->id,
            'month_id' => $request->month_id,
            'amount' => $month->fee
        ]);

        // $months = session('months', []);
        // array_push($months, $request->month_id);
        // session(['months' => array_unique($months)]);
        return redirect('/basket');
    });

    Route::get('/basket', function () {
        return Inertia::render('Basket', [
            // 'months' => collect(session('months', []))->map(function ($m) {
            //     return Month::where('id', $m)->with(['lessons', 'recordings'])->first()->toArray();
            // })->toArray(),
            'payments' => Payment::query()
                ->where('user_id', request()->user()->id)
                ->whereNull('purchased_at')
                ->with([
                    'month' => function ($q) {
                        $q->with(['lessons', 'recordings']);
                    }
                ])
                ->get(),
            'fee' => config('stripe.fee')
        ]);
    })->name('basket');

    Route::delete('/payments', function (Request $request) {
        Payment::where('id', $request->id)->whereNull('purchased_at')->delete();
        return redirect('/basket');
    });

    Route::post('/checkout', function () {
        \Stripe\Stripe::setApiKey(config('stripe.secret'));

        $months = Month::whereHas('payments', function ($q) {
            $q
                ->where('user_id', request()->user()->id)
                ->whereNull('purchased_at');
        })
            ->with(['lessons', 'recordings'])
            ->get();

        $session = \Stripe\Checkout\Session::create([
            'line_items' => collect($months)->map(function ($month) {
                return [
                    'price_data' => [
                        'currency' => 'gbp',
                        'unit_amount' => config('stripe.fee'),
                        'product_data' => [
                            'name' => Carbon::createFromDate($month->started_at)->format('F Y'),
                        ],
                    ],
                    'quantity' => 1,
                ];
            })->toArray(),
            'metadata' => [
                'months' => json_encode($months->map(function ($m) {
                    return $m->id;
                })->toArray()),
                'user_id' => request()->user()->id
            ],
            'mode' => 'payment',
            'success_url' => route('purchased'),
            'cancel_url' => route('basket')
        ]);
        return response()->json([
            'url' => $session->url,
        ]);
    });

    Route::get('/purchased', function () {
        return to_route('dashboard');
    })->name('purchased');

    Route::get('/live', function (ApiVideo $apiVideo) {
        $liveStreams = $apiVideo->client()->liveStreams()->list();
        return Inertia::render('Live', [
            'liveStreams' => $liveStreams,
        ]);
    })->name('live');

    Route::prefix('tutor')->middleware(IsTutor::class)->group(function () {

        Route::get('/', function (ApiVideo $apiVideo) {
            //  SHOW A LIST OF UPCOMING LESSONS
            $upcomingLessons = Lesson::where('available_at', '>', Carbon::now())->with(['course'])->get();

            return Inertia::render('Tutor/Dashboard', [
                'upcomingLessons' => $upcomingLessons,
            ]);
        })->name('tutor');

    });
});

// Stripe webhook
Route::post('/stripe/callback', [\App\Http\Controllers\StripeController::class, 'stripeCallback']);
