<?php

// app/Models/Withdraw.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
    'user_id',
    'method_id',
    'type_id',
    'number', // ✅ এখানে নিশ্চিত হও
    'amount',
    'charge',
    'total',
    'status',
];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function method()
    {
        return $this->belongsTo(WithdrawMethod::class);
    }

    public function type()
    {
        return $this->belongsTo(WithdrawType::class);
    }
}
