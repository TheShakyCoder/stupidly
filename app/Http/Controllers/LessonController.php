<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Inertia\Inertia;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    public function show(Lesson $lesson)
    {
        return Inertia::render('Lesson/Show', [
            'lesson' => $lesson,
        ]);
    }

    public function watch(Lesson $lesson)
    {
        $user = auth()->user();
        if (!$user->is_tutor && !$lesson->month->is_purchased) {
            abort(403, 'You must purchase this month to watch the lesson.');
        }

        return Inertia::render('Lesson/Watch', [
            'lesson' => $lesson->load('course'),
            'playlistUrl' => route('lessons.playlist', $lesson->id),
        ]);
    }

    public function playlist(Lesson $lesson)
    {
        $user = auth()->user();
        if (!$user->is_tutor && !$lesson->month->is_purchased) {
             abort(403);
        }

        if (!$lesson->path) {
            abort(404);
        }

        $pathPath = parse_url($lesson->path, PHP_URL_PATH);
        $key = ltrim($pathPath, '/');
        
        $content = Storage::disk('spaces')->get($key);
        
        if (!$content) {
            abort(404);
        }

        $directory = dirname($key);
        $lines = explode("\n", $content);
        $newContent = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if (Str::endsWith($line, '.ts')) {
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
