<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
     protected $fillable = [
        'invoice_id',
        'user_id',
        'amount',
    ];
}
