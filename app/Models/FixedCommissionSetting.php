<?php

// app/Models/FixedCommissionSetting.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FixedCommissionSetting extends Model
{
    protected $fillable = ['generation', 'amount'];
}
