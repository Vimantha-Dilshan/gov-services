<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function citizen()
    {
        return $this->belongsTo(Citizen::class);
    }

    public function etc()
    {
        return $this->hasMany(VehicleEtc::class);
    }

    public const TYPE_CAR = 'CAR';
    public const TYPE_MOTORCYCLE = 'MOTORCYCLE';
    public const TYPE_TRUCK = 'TRUCK';
    public const TYPE_VAN = 'VAN';
    public const TYPE_BUS = 'BUS';
    public const TYPE_SUV = 'SUV';
    public const TYPE_MINIVAN = 'MINIVAN';
}
