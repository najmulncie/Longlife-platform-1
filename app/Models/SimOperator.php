<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\driverPacks;

class SimOperator extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function driverPacks()
    {
        return $this->hasMany(DriverPack::class);
    }

}
