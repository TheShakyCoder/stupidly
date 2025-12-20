<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'covers')->using(Cover::class);
    }

    public function covers()
    {
        return $this->hasMany(Cover::class);
    }

    public function getRouteKeyName(): string
    {
        return 'key';
    }
}
