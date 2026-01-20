<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Month extends Model
{
    /** @use HasFactory<\Database\Factories\MonthFactory> */
    use HasFactory;

    protected $dates = ['started_at'];

    protected $appends = ['is_purchased'];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class)->orderBy('available_at');
    }

    public function recordings(): HasMany
    {
        return $this->hasMany(Recording::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'covers')->using(Payment::class);
    }
    
    public function getIsPurchasedAttribute()
    {
        return auth()->check() && $this->payments()->where('user_id', auth()->id())->exists();
    }
}
