<?php

namespace Database\Factories;

use App\Models\DriverLicense;
use App\Models\Citizen;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DriverLicenseFactory extends Factory
{
    protected $model = DriverLicense::class;

    public function definition(): array
    {
        $issuedDate = fake()->dateTimeBetween('-10 years', 'now');
        $expiryDate = fake()->dateTimeBetween($issuedDate, '+10 years');

        return [
            'citizen_id' => Citizen::factory(),
            'license_number' => strtoupper(fake()->bothify('DL####??')),
            'license_type' => fake()->randomElement(array: DriverLicense::TYPES),
            'issued_date' => $issuedDate->format('Y-m-d'),
            'expiry_date' => $expiryDate->format('Y-m-d'),
            'issuing_authority' => fake()->city . ' Licensing Dept',
            'is_active' => fake()->boolean(90),
            'status' => fake()->randomElement(array: DriverLicense::STATUSES),
        ];
    }
}
