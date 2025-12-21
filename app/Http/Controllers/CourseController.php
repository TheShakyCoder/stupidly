<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Course;

class CourseController extends Controller
{
    public function index() {
        $skills = Skill::with('courses')->get()->map(function ($skill) {
            return [
                'name' => $skill->name,
                'courses' => $skill->courses,
            ];
        });

        return Inertia::render('Course/Index', [
            'skills' => $skills,
        ]);
    }

    public function show(Course $course) {
        return Inertia::render('Course/Show', [
            'course' => $course->load('skills'),
        ]);
    }
}
