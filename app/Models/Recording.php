<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Recording extends Lesson
{
    protected $table = 'lessons';

    protected static function booted()
    {
        static::addGlobalScope('has_path', function (Builder $builder) {
            $builder
                ->whereNotNull('path')
                ->where('available_at', '<', now());
        });
    }
}
