<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Month;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class AdminLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Lessons/Index', [
            'lessons' => Lesson::with(['course', 'month'])
                ->orderBy('created_at', 'desc')
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Lessons/Create', [
            'courses' => Course::all(),
            'months' => Month::orderBy('started_at', 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'month_id' => 'required|exists:months,id',
            'title' => 'required|string|max:255',
            'available_at' => 'required|date',
            'is_video_available' => 'boolean|nullable',
        ]);

        $uuid = Str::uuid();
        $folderName = $uuid->toString();
        
        $envFolder = config('filesystems.disks.spaces.folder');
        $storagePath = $envFolder ? "{$envFolder}/{$folderName}" : $folderName;

        Storage::disk('spaces')->makeDirectory($storagePath);
        
        // Construct the FQDN prefix
        $domain = config('filesystems.disks.spaces.domain');
        $bucket = config('filesystems.disks.spaces.bucket');
        $region = config('filesystems.disks.spaces.region');
        $fqdn = "https://{$bucket}.{$region}.{$domain}";

        $filename = 'index.m3u8';
        $path = "{$fqdn}/{$storagePath}/{$filename}";

        Lesson::create([
            'course_id' => $validated['course_id'],
            'month_id' => $validated['month_id'],
            'title' => $validated['title'],
            'available_at' => $validated['available_at'],
            'is_video_available' => $validated['is_video_available'] ?? false,
            'path' => $path,
        ]);

        return to_route('admin.lessons.index')
            ->with('flash.banner', "Lesson created! Please upload your '{$filename}' and segments to the folder: {$folderName}");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        return Inertia::render('Admin/Lessons/Edit', [
            'lesson' => $lesson,
            'courses' => Course::all(),
            'months' => Month::orderBy('started_at', 'desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'month_id' => 'required|exists:months,id',
            'title' => 'required|string|max:255',
            'available_at' => 'required|date',
            'is_video_available' => 'boolean|nullable',
        ]);

        $updateData = [
            'course_id' => $validated['course_id'],
            'month_id' => $validated['month_id'],
            'title' => $validated['title'],
            'available_at' => $validated['available_at'],
            'is_video_available' => $validated['is_video_available'] ?? false,
        ];

        $filename = 'index.m3u8';
        if(!$lesson->path) {
            $uuid = Str::uuid();
            $folderName = $uuid->toString();
            $envFolder = config('filesystems.disks.spaces.folder');
            $storagePath = $envFolder ? "{$envFolder}/{$folderName}" : $folderName;

            Storage::disk('spaces')->makeDirectory($storagePath);
            
            // Construct the FQDN prefix
            $domain = config('filesystems.disks.spaces.domain');
            $bucket = config('filesystems.disks.spaces.bucket');
            $region = config('filesystems.disks.spaces.region');
            $fqdn = "https://{$bucket}.{$region}.{$domain}";
            
            $newPath = "{$fqdn}/{$storagePath}/{$filename}";
            $updateData['path'] = $newPath;

            
        }
        
        $lesson->update($updateData);
        
        $bannerMessage = "Lesson updated! Please upload your '{$filename}' and segments to the NEW folder: {$lesson->path}";
        $redirect = to_route('admin.lessons.index');
        $redirect->with('flash.banner', $bannerMessage);
        return $redirect;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        if ($lesson->path) {
            $pathPath = parse_url($lesson->path, PHP_URL_PATH);
            $key = ltrim($pathPath, '/');
            $directory = dirname($key);

            if ($directory && $directory !== '.' && $directory !== '/') {
                Storage::disk('spaces')->deleteDirectory($directory);
            }
        }

        $lesson->delete();

        return to_route('admin.lessons.index');
    }

    public function preview(Lesson $lesson)
    {
        return Inertia::render('Admin/Lessons/Preview', [
            'lesson' => $lesson->load('course'),
            'playlistUrl' => route('admin.lessons.playlist', $lesson->id),
        ]);
    }

    public function playlist(Lesson $lesson)
    {
        if (!$lesson->path) {
            abort(404);
        }

        // Logic to retrieve the playlist content
        $pathPath = parse_url($lesson->path, PHP_URL_PATH);
        $key = ltrim($pathPath, '/');
        
        $content = Storage::disk('spaces')->get($key);
        
        if (!$content) {
            abort(404);
        }

        // Base directory for segments (same as playlist)
        $directory = dirname($key);

        // Replace relative .ts paths with signed URLs
        $lines = explode("\n", $content);
        $newContent = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if (Str::endsWith($line, '.ts')) {
                // Generate signed URL for the segment
                $segmentKey = "{$directory}/{$line}";
                $signedUrl = Storage::disk('spaces')->temporaryUrl(
                    $segmentKey,
                    now()->addHour()
                );
                $newContent[] = $signedUrl;
            } else {
                $newContent[] = $line;
            }
        }

        return response(implode("\n", $newContent))
            ->header('Content-Type', 'application/vnd.apple.mpegurl');
    }
}
