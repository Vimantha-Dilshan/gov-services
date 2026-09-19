<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Passport extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date_of_birth' => 'date',
        'issued_date' => 'date',
        'expiry_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function citizen(): BelongsTo
    {
        return $this->belongsTo(Citizen::class);
    }

    public const TYPES = ['ORDINARY', 'DIPLOMATIC', 'OFFICIAL'];

    public const STATUSES = ['ACTIVE', 'EXPIRED', 'CANCELLED'];
}
