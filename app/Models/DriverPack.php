<?php

namespace App\Models;

use App\Models\SimOperator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverPack extends Model
{
    use HasFactory;

    protected $fillable = [
        'sim_operator_id',
        'offer_title',
        'validity',
        'price',
        'cashback',
    ];

   public function simOperator()
    {
        return $this->belongsTo(SimOperator::class);
    }

}
