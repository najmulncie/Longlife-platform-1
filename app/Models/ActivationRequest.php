<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivationRequest extends Model
{

    public function user()
{
    return $this->belongsTo(User::class);
}

    protected $fillable = [
    'user_id',
    'method',
    'user_number',
    'transaction_id',
    'screenshot',
    'status', // যদি থাকে
];

}
