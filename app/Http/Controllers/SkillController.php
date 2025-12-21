<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;


class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::with('courses')->get()->map(function ($skill) {
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
