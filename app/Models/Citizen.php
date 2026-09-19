<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Citizen extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'dob' => 'date',
    ];

    // Gender constants
    public const GENDER_MALE   = 'MALE';
    public const GENDER_FEMALE = 'FEMALE';
    public const GENDER_OTHER  = 'OTHER';

    public const GENDERS = [
        self::GENDER_MALE,
        self::GENDER_FEMALE,
        self::GENDER_OTHER,
    ];

    // Blood type constants
    public const BLOOD_A_POS  = 'A+';
    public const BLOOD_A_NEG  = 'A-';
    public const BLOOD_B_POS  = 'B+';
    public const BLOOD_B_NEG  = 'B-';
    public const BLOOD_AB_POS = 'AB+';
    public const BLOOD_AB_NEG = 'AB-';
    public const BLOOD_O_POS  = 'O+';
    public const BLOOD_O_NEG  = 'O-';

    public const BLOOD_TYPES = [
        self::BLOOD_A_POS,
        self::BLOOD_A_NEG,
        self::BLOOD_B_POS,
        self::BLOOD_B_NEG,
        self::BLOOD_AB_POS,
        self::BLOOD_AB_NEG,
        self::BLOOD_O_POS,
        self::BLOOD_O_NEG,
    ];

    public function getFullNameAttribute(): string
    {
        return trim(
            ($this->initial_name ? $this->initial_name . ' ' : '') .
                ($this->first_name ? $this->first_name . ' ' : '') .
                ($this->last_name ? $this->last_name . ' ' : '') .
                ($this->surname ?? '')
        );
    }

    public function getTitleAttribute(): string
    {
        return match (strtoupper($this->gender)) {
            'MALE' => 'Mr',
            'FEMALE' => 'Mrs',
            'OTHER' => 'Mx',
            default => '',
        };
    }

    public function driverLicenses(): HasMany
    {
        return $this->hasMany(DriverLicense::class);
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }
}
