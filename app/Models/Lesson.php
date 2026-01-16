<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
