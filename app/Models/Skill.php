<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /** @use HasFactory<\Database\Factories\SkillFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'covers')->using(Cover::class);
    }

    public function covers()
    {
        return $this->hasMany(Cover::class);
    }
}
