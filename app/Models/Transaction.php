<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'transaction_id',
        'invoice_id',
        'amount',
        'status',
        'payment_method',
        'phone',
        'response_data',
    ];

    protected $casts = [
        'response_data' => 'array',
    ];
}

