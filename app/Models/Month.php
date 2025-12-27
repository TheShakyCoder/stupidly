<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    /** @use HasFactory<\Database\Factories\MonthFactory> */
    use HasFactory;


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'covers')->using(Payment::class);
    }
}
