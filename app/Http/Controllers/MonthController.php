<?php

namespace App\Http\Controllers;

use App\Models\Month;
use Inertia\Inertia;

class MonthController extends Controller
{
    public function show(Month $month)
    {
        return Inertia::render('Month/Show', [
            'month' => $month->load(['lessons.course.skills', 'recordings']),
        ]);
    }
}
