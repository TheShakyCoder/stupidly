<?php

use App\Models\Course;
use App\Models\Month;
use Carbon\Carbon;
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
        return Inertia::render('Dashboard', [
            'currentMonth' => Month
                ::query()
                ->whereBetween('started_at', [
                    Carbon::now()->startOfMonth(),
                    Carbon::now()->endOfMonth()
                ])
                ->with([
                    'payments' => function ($q) {
                        $q->where('user_id', request()->user()->id);
                    }
                ])
                ->first(),
            'months' => Month::orderBy('started_at')->get(),
        ]);
    })->name('dashboard');

});

// Stripe webhook
Route::post('/stripe/callback', [\App\Http\Controllers\StripeController::class, 'stripeCallback']);
