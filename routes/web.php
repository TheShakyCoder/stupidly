<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

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

Route::resource('courses', \App\Http\Controllers\CourseController::class)->only(['index','show']);
Route::resource('skills', \App\Http\Controllers\SkillController::class)->only(['index']);
Route::resource('lessons', \App\Http\Controllers\LessonController::class)->only(['show']);

Route::get('/tutors', function () {
    return Inertia::render('Tutor/Index', [
        'tutors' => \App\Models\Tutor::paginate(10),
    ]);
});
