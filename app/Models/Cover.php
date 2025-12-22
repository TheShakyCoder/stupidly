<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cover extends Pivot
{
    /** @use HasFactory<\Database\Factories\CoverFactory> */
    use HasFactory;

    protected $table = 'covers';

    protected $fillable = [
        'skill_id',
        'course_id',
    ];

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
