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
            'folder' => 'required|array', // Expecting an array of files/metadata
            'folder.*' => 'file',
        ]);

        $path = null;

        if ($request->hasFile('folder')) {
            $uuid = Str::uuid();
            $folderName = $uuid->toString();
            // Prefix with SPACES_FOLDER not needed if handled by filesystem config, 
            // but requirements said "each environment should store in the SPACES_FOLDER in .env"
            // The 'spaces' disk in config/filesystems.php uses 'root' => env('SPACES_FOLDER'), 
            // so we just store relative to that.
            
            // Wait, looking at config/filesystems.php provided earlier:
            // 'folder' => env('SPACES_FOLDER'), 
            // But 'root' is NOT set for 'spaces' disk in the file content I saw. 
            // It had 'bucket', 'key', 'secret', etc. and a custom 'folder' key.
            // The 'driver' => 's3' doesn't automatically use 'folder' config key as root.
            // Usually 'root' is the key for root directory.
            // However, looking at the provided config/filesystems.php:
            // 'spaces' => [ ..., 'folder' => env('SPACES_FOLDER'), ... ]
            // This 'folder' key seems custom or handled by a service provider?
            // Or maybe I should respect it manually.
            
            $envFolder = config('filesystems.disks.spaces.folder');
            $storagePath = $envFolder ? "{$envFolder}/{$folderName}" : $folderName;
            
            // Construct the FQDN prefix
            $bucket = config('filesystems.disks.spaces.bucket');
            $region = config('filesystems.disks.spaces.region');
            $fqdn = config('filesystems.disks.spaces.endpoint');

            foreach ($request->file('folder') as $file) {
                $filename = $file->getClientOriginalName();
                // Store file with 'private' visibility
                Storage::disk('spaces')->putFileAs($storagePath, $file, $filename, 'private');

                if (Str::endsWith($filename, '.m3u8')) {
                    // Store the Path including FQDN
                    $path = "{$fqdn}/{$storagePath}/{$filename}";
                }
            }
        }

        if (!$path) {
             return back()->withErrors(['folder' => 'No .m3u8 file found in the uploaded folder.']);
        }

        Lesson::create([
            'course_id' => $validated['course_id'],
            'month_id' => $validated['month_id'],
            'title' => $validated['title'],
            'available_at' => $validated['available_at'],
            'path' => $path,
        ]);

        return to_route('admin.lessons.index');
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
            'folder' => 'nullable|array',
            'folder.*' => 'file',
        ]);

        if ($request->hasFile('folder')) {
             // Delete old connection if exists? 
             if ($lesson->path) {
                 // Clean up logic needs to handle full URL now
                 // Assuming path is a URL, parse it to get directory
                 $pathPath = parse_url($lesson->path, PHP_URL_PATH);
                 // remove leading slash
                 $key = ltrim($pathPath, '/');
                 $directory = dirname($key);
                 
                 if ($directory && $directory !== '.' && $directory !== '/') {
                     Storage::disk('spaces')->deleteDirectory($directory);
                 }
             }

            $uuid = Str::uuid();
            $folderName = $uuid->toString();
            $envFolder = config('filesystems.disks.spaces.folder');
            $storagePath = $envFolder ? "{$envFolder}/{$folderName}" : $folderName;
            
            // Construct the FQDN prefix
            $bucket = config('filesystems.disks.spaces.bucket');
            $region = config('filesystems.disks.spaces.region');
            $fqdn = config('filesystems.disks.spaces.endpoint');
            
            $newPath = null;

            foreach ($request->file('folder') as $file) {
                $filename = $file->getClientOriginalName();
                Storage::disk('spaces')->putFileAs($storagePath, $file, $filename, 'private');

                if (Str::endsWith($filename, '.m3u8')) {
                    $newPath = "{$fqdn}/{$storagePath}/{$filename}";
                }
            }
            
            if ($newPath) {
                $lesson->path = $newPath;
            } else {
                 return back()->withErrors(['folder' => 'No .m3u8 file found in the uploaded folder.']);
            }
        }

        $lesson->update([
            'course_id' => $validated['course_id'],
            'month_id' => $validated['month_id'],
            'title' => $validated['title'],
            'available_at' => $validated['available_at'],
            'path' => $lesson->path, // In case it was updated above
        ]);

        return to_route('admin.lessons.index');
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
