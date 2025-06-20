<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class WithdrawRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'method',
        'type',
        'recipient_number',
        'amount',
        'charge',
        'total_deducted',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
