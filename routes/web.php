<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::get('/pricing', function () {
    return Inertia::render('Pricing');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// Route::get('/courses/{course:key}', function (\App\Models\Course $course) {
//     return Inertia::render('Course/Show', [
//         'course' => $course
//     ]);
// })->name('courses.show');
Route::resource('courses', \App\Http\Controllers\CourseController::class)->only(['index','show']);

Route::get('/topics', function () {
    return Inertia::render('Topic/Index', [
        'topics' => \App\Models\Topic::paginate(10),
    ]);
});

Route::get('/tutors', function () {
    return Inertia::render('Tutor/Index', [
        'tutors' => \App\Models\Tutor::paginate(10),
    ]);
});
