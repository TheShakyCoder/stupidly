<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index()
    {
        return Inertia::render('Course/Index', [
            'courses' => Course::with(['lessons', 'ratings', 'skills'])->get(),
        ]);
    }

    public function show(Course $course)
    {
        return Inertia::render('Course/Show', [
            'course' => $course->load('skills', 'bullets', 'lessons', 'tutor.user', 'requirements'),
        ]);
    }
}
