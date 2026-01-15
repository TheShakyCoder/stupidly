<?php

namespace App\Http\Controllers;

use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::with([
            'courses' => function ($q) {
                $q->with(['lessons', 'ratings']);
            },
        ])
            ->orderBy('name')
            ->get()
            ->map(function ($skill) {
                return [
                    'name' => $skill->name,
                    'courses' => $skill->courses,
                ];
            });

        return inertia('Skill/Index', [
            'skills' => $skills,
        ]);
    }
}
