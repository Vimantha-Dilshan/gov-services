<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleEtc extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'amount' => 'float',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public const TYPE_HIGHWAY = 'HIGHWAY';
    public const TYPE_EXPRESSWAY = 'EXPRESSWAY';
    public const TYPE_MOTORWAY = 'MOTORWAY';

    public const STATUSES = [
        'ACTIVE',
        'INACTIVE',
        'SUSPENDED',
    ];
}
