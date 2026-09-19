<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DriverLicense extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function citizen(): BelongsTo
    {
        return $this->belongsTo(Citizen::class);
    }

    public const TYPE_LIGHT = 'LIGHT';
    public const TYPE_HEAVY = 'HEAVY';
    public const TYPE_MOTORCYCLE = 'MOTORCYCLE';
    public const TYPE_COMMERCIAL = 'COMMERCIAL';

    public const STATUS_ACTIVE = 'ACTIVE';
    public const STATUS_INACTIVE = 'INACTIVE';
    public const STATUS_SUSPENDED = 'SUSPENDED';

    public const TYPES = [
        self::TYPE_LIGHT,
        self::TYPE_HEAVY,
        self::TYPE_MOTORCYCLE,
        self::TYPE_COMMERCIAL,
    ];

    public const STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE,
        self::STATUS_SUSPENDED,
    ];
}
