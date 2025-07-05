<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DriverPackPurchase extends Model
{
    protected $fillable = [
        'user_id', 'sim_operator', 'offer_title','validity', 'price', 'cashback',
        'phone_number', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function driverPack()
    // {
    //     return $this->belongsTo(DriverPack::class, 'offer_title', 'sim_operator', 'price');
    // }
}
