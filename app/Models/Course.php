<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'title',
        'description',
        'synopsis',
        'image',
        'preview',
        'user_id',
        'level',
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'covers')->using(Cover::class);
    }

    public function bullets(): HasMany
    {
        return $this->hasMany(Bullet::class);
    }

    public function covers()
    {
        return $this->hasMany(Cover::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function requirements()
    {
        return $this->hasMany(Requirement::class);
    }

    public function getRouteKeyName(): string
    {
        return 'key';
    }
}
