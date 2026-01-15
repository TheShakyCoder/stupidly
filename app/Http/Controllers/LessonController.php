<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Inertia\Inertia;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        return Inertia::render('Lesson/Show', [
            'lesson' => $lesson,
        ]);
    }
}
