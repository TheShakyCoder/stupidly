<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    protected $fillable = [
        'course_id',
        'month_id',
        'title',
        'path',
        'available_at',
        'google_meet_link',
        'is_video_available',
    ];

    protected $casts = [
        'is_video_available' => 'boolean',
    ];

    protected $appends = [
        'signed_path',
    ];

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getSignedPathAttribute()
    {
        if (!$this->path) {
            return null;
        }

        // Extract key from full FQDN URL if present
        if (filter_var($this->path, FILTER_VALIDATE_URL)) {
             $path = parse_url($this->path, PHP_URL_PATH);
             // Remove leading slash to get the S3 object key
             $key = ltrim($path, '/');
        } else {
             $key = $this->path;
        }

        return Storage::disk('spaces')->temporaryUrl(
            $key,
            now()->addHour()
        );
    }
}
