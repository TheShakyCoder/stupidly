<?php

namespace App\Http\Controllers;

use App\Models\Month;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Months/Index', [
            'months' => Month::orderBy('started_at', 'desc')->withCount(['lessons', 'recordings'])->paginate(12),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Month $month)
    {
        return Inertia::render('Admin/Months/Edit', [
            'month' => $month,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Month $month)
    {
        $validated = $request->validate([
            'fee' => 'required|integer|min:0',
            'fee_recordings' => 'required|integer|min:0',
        ]);

        $month->update($validated);

        return to_route('admin.months.index')
            ->with('flash.banner', 'Month pricing updated successfully.');
    }
}
