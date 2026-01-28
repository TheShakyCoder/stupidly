<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AdminCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Courses/Index', [
            'courses' => Course::withCount('lessons')
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Courses/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'synopsis' => 'nullable|string|max:500',
            'image' => 'nullable|url',
            'preview' => 'nullable|url',
            'level' => 'nullable|string|max:50',
        ]);

        // Generate a unique key from the title
        $key = Str::slug($validated['title']);
        $originalKey = $key;
        $counter = 1;
        
        while (Course::where('key', $key)->exists()) {
            $key = $originalKey . '-' . $counter;
            $counter++;
        }

        Course::create([
            'key' => $key,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'synopsis' => $validated['synopsis'] ?? null,
            'image' => $validated['image'] ?? null,
            'preview' => $validated['preview'] ?? null,
            'level' => $validated['level'] ?? null,
        ]);

        return to_route('admin.courses.index')
            ->with('flash.banner', 'Course created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return Inertia::render('Admin/Courses/Edit', [
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'synopsis' => 'nullable|string|max:500',
            'image' => 'nullable|url',
            'preview' => 'nullable|url',
            'level' => 'nullable|string|max:50',
        ]);

        // Regenerate key if title changed
        if ($validated['title'] !== $course->title) {
            $key = Str::slug($validated['title']);
            $originalKey = $key;
            $counter = 1;
            
            while (Course::where('key', $key)->where('id', '!=', $course->id)->exists()) {
                $key = $originalKey . '-' . $counter;
                $counter++;
            }
            $validated['key'] = $key;
        }

        $course->update($validated);

        return to_route('admin.courses.index')
            ->with('flash.banner', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        // Check if course has lessons
        if ($course->lessons()->count() > 0) {
            return back()->with('flash.banner', 'Cannot delete course with existing lessons. Please delete the lessons first.')
                ->with('flash.bannerStyle', 'danger');
        }

        $course->delete();

        return to_route('admin.courses.index')
            ->with('flash.banner', 'Course deleted successfully!');
    }
}
