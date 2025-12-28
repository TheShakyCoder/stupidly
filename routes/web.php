<?php

use App\Models\Course;
use App\Models\Month;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
                }
            ])
            ->first();
        return Inertia::render('Dashboard', [
            'currentMonth' => $currentMonth,
            'months' => Month::with([
                'payments' => function ($q) {
                    $q->where('user_id', request()->user()->id);
                }
            ])->orderBy('started_at')->get(),
        ]);
    })->name('dashboard');

    Route::post('/basket', function (Request $request) {
        $months = session('months', []);
        array_push($months, $request->month_id);

        session(['months' => array_unique($months)]);
        return redirect('/basket');
    });

    Route::get('/basket', function () {
        return Inertia::render('Basket', [
            'months' => collect(session('months', []))->map(function ($month) {
                return ['month_id' => $month];
            })
        ]);
    })->name('basket');

    Route::post('/checkout', function (Request $request) {
        \Stripe\Stripe::setApiKey(config('stripe.secret'));
        $months = session('months', []);
        $session = \Stripe\Checkout\Session::create([
            'line_items' => collect($months)->map(function ($month) {
                $monthRecord = Month::find($month);
                return [
                    'price_data' => [
                        'currency' => 'gbp',
                        'unit_amount' => config('stripe.fee'),
                        'product_data' => [
                            'name' => Carbon::createFromDate($monthRecord->started_at)->format('F Y'),
                        ],
                    ],
                    'quantity' => 1,
                ];
            })->toArray(),
            'metadata' => [
                'months' => json_encode($months),
                'user_id' => request()->user()->id
            ],
            'mode' => 'payment',
            'success_url' => route('purchased'),
            'cancel_url' => route('checkout')
        ]);
        return response()->json([
            'url' => $session->url,
        ]);
    });

    Route::get('/checkout', function () {
        $months = session('months', []);
        return Inertia::render('Checkout', [
            'months' => $months
        ]);
    })->name('checkout');

    Route::get('/purchased', function () {
        session()->flush();

        return to_route('dashboard');
    })->name('purchased');
});

// Stripe webhook
Route::post('/stripe/callback', [\App\Http\Controllers\StripeController::class, 'stripeCallback']);
