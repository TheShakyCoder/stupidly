<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Tutor/Index', [
            'tutors' => Tutor::with('user')->paginate(10),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tutor $tutor)
    {
        $tutor->load(['user', 'socialLinks']);

        return Inertia::render('Tutor/Show', [
            'tutor' => $tutor,
        ]);
    }
}
