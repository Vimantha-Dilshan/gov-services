<?php

namespace Database\Factories;

use App\Models\Citizen;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitizenFactory extends Factory
{
    protected $model = Citizen::class;

    public function definition(): array
    {
        $surname = fake()->lastName();
        $family = fake()->lastName();

        $initial_name = "$surname $family";

        $initials = collect(explode(' ', $initial_name))
            ->map(fn($word) => strtoupper(substr($word, 0, 1)))
            ->implode('');

        return [
            'nic' => strtoupper(fake()->unique()->bothify('#########V')),
            'initials' => $initials,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'surname' => $surname,
            'initial_name' => $initial_name,
            'dob' => fake()->date('Y-m-d', '-18 years'),
            'gender' => fake()->randomElement(Citizen::GENDERS),
            'contact_number' => '07' . fake()->numberBetween(10000000, 99999999),
            'blood_type' => fake()->randomElement(Citizen::BLOOD_TYPES),
            'occupation' => fake()->jobTitle(),
            'city' => fake()->city(),
            'permanent_address' => fake()->address(),
            'death_date' => null,
        ];
    }
}
