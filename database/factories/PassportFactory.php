<?php

namespace Database\Factories;

use App\Models\Citizen;
use App\Models\Passport;
use Illuminate\Database\Eloquent\Factories\Factory;

class PassportFactory extends Factory
{
    protected $model = Passport::class;

    public function definition(): array
    {
        $issuedDate = fake()->dateTimeBetween('-10 years', 'now');
        $expiryDate = fake()->dateTimeBetween($issuedDate, '+10 years');

        return [
            'citizen_id' => Citizen::factory(),
            'passport_number' => strtoupper(fake()->unique()->bothify('P########')),
            'passport_type' => fake()->randomElement(Passport::TYPES),
            'nationality' => fake()->countryCode(),
            'date_of_birth' => fake()->date('Y-m-d', '-18 years'),
            'place_of_birth' => fake()->city(),
            'sex' => fake()->randomElement(Citizen::GENDERS),
            'issued_date' => $issuedDate->format('Y-m-d'),
            'expiry_date' => $expiryDate->format('Y-m-d'),
            'issuing_authority' => fake()->city . ' Passport Office',
            'status' => fake()->randomElement(Passport::STATUSES),
            'is_active' => fake()->boolean(90),
        ];
    }
}
