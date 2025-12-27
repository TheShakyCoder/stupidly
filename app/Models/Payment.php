<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Payment extends Pivot
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory;

    protected $table = 'payments';

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
