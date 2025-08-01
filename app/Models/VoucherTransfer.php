<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoucherTransfer extends Model
{
    protected $fillable = [
        'user_id', 'method', 'number', 'amount', 'charge', 'received', 'status'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
