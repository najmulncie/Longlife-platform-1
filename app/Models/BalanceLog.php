<?php

// app/Models/BalanceLog.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceLog extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'description',
    ];
}