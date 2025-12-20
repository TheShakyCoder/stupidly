<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Course;

class CourseController extends Controller
{
    public function index() {
        return Inertia::render('Course/Index', [
            'courses' => Course::paginate(perPage: 12),
        ]);
    }

    public function show(Course $course) {
        return Inertia::render('Course/Show', [
            'course' => $course
        ]);
    }
}
