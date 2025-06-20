<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    protected $fillable = [
        'method',
        'number',
        'description',
    ];

    // অন্যান্য কোড...
}
