<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoliceRecord extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'incident_date' => 'date',
        'reported_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function citizen(): BelongsTo
    {
        return $this->belongsTo(Citizen::class);
    }

    public const STATUSES = ['OPEN', 'UNDER_INVESTIGATION', 'CLOSED'];
}
