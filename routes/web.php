<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\IsTutor;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Month;
use App\Models\Payment;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Services\ApiVideo;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'recent' => Course::whereHas('lessons')->with(['lessons'])->orderBy('created_at')->limit(3)->get(),
    ]);
})->name('home');

Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/parent-guide', function () {
    return Inertia::render('ParentGuide');
})->name('parent-guide');

Route::get('/privacy', function () {
    return Inertia::render('PrivacyPolicy', [
        'privacy' => File::get(resource_path('markdown/privacy.md')),
    ]);
})->name('privacy');

Route::get('/terms-of-service', function () {
    return Inertia::render('TermsOfService', [
        'terms' => File::get(resource_path('markdown/terms.md')),
    ]);
})->name('terms');

Route::resource('courses', \App\Http\Controllers\CourseController::class)->only(['index', 'show']);
Route::resource('skills', \App\Http\Controllers\SkillController::class)->only(['index']);
Route::resource('lessons', \App\Http\Controllers\LessonController::class)->only(['show']);
Route::resource('months', \App\Http\Controllers\MonthController::class)->only(['show']);
Route::resource('tutors', \App\Http\Controllers\TutorController::class)->only(['index', 'show']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        $currentMonth = Month::whereBetween('started_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])
            ->with([
                'payments' => function ($q) {
                    $q->where('user_id', request()->user()->id);
                },
                'lessons.course',
            ])
            ->first();

        return Inertia::render('Dashboard', [
            'currentMonth' => $currentMonth,
            'months' => Month::with([
                'payments' => function ($q) {
                    $q->where('user_id', request()->user()->id);
                }, 'lessons', 'recordings',
            ])->orderBy('started_at', 'DESC')->get(),
        ]);
    })->name('dashboard');

    Route::post('/basket', function (Request $request) {
        $month = Month::where('id', $request->month_id)->first();

        if ($request->user()->free) {
            Payment::create([
                'user_id' => $request->user()->id,
                'month_id' => $request->month_id,
                'amount' => 0,
                'purchased_at' => Carbon::now(),
            ]);

            return redirect()->route('dashboard');
        }

        Payment::create([
            'user_id' => $request->user()->id,
            'month_id' => $request->month_id,
            'amount' => $month->fee,
        ]);

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
                    },
                ])
                ->get(),
            'fee' => config('stripe.fee'),
        ]);
    })->name('basket');

    Route::delete('/payments', function (Request $request) {
        Payment::where('id', $request->id)->whereNull('purchased_at')->delete();

        return redirect()->back();
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
                        'unit_amount' => $month->fee,
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
                'user_id' => request()->user()->id,
            ],
            'mode' => 'payment',
            'success_url' => route('purchased'),
            'cancel_url' => route('basket'),
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

    Route::get('/lessons/{lesson}/google-meet/connect', [\App\Http\Controllers\GoogleMeetController::class, 'create'])->name('lessons.google-meet.create');
    Route::get('/auth/google/callback', [\App\Http\Controllers\GoogleMeetController::class, 'store']);

    Route::get('/lessons/{lesson}/watch', [\App\Http\Controllers\LessonController::class, 'watch'])->name('lessons.watch');
    Route::get('/lessons/{lesson}/playlist', [\App\Http\Controllers\LessonController::class, 'playlist'])->name('lessons.playlist');

    Route::prefix('admin')->middleware(\App\Http\Middleware\IsAdmin::class)->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Admin/Dashboard');
        })->name('dashboard');

        Route::resource('users', \App\Http\Controllers\AdminUserController::class);
        Route::get('/lessons/{lesson}/preview', [\App\Http\Controllers\AdminLessonController::class, 'preview'])->name('lessons.preview');
        Route::get('/lessons/{lesson}/playlist', [\App\Http\Controllers\AdminLessonController::class, 'playlist'])->name('lessons.playlist');
        Route::resource('lessons', \App\Http\Controllers\AdminLessonController::class);
    });
});

// Stripe webhook
Route::post('/stripe/callback', [\App\Http\Controllers\StripeController::class, 'stripeCallback']);

// Route::get('/{page}', [PageController::class, 'page'])->name('page');
