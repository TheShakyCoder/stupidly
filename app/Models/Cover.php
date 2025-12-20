<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cover extends Pivot
{
    /** @use HasFactory<\Database\Factories\CoverFactory> */
    use HasFactory;

    protected $table = 'covers';
}
