<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\Citizen;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition(): array
    {
        $makes = ['Toyota', 'Honda', 'Nissan', 'Ford', 'Suzuki', 'Mitsubishi', 'Hyundai'];
        $colors = ['Red', 'Blue', 'Black', 'White', 'Silver', 'Green', 'Yellow'];
        $types = [
            Vehicle::TYPE_CAR,
            Vehicle::TYPE_MOTORCYCLE,
            Vehicle::TYPE_TRUCK,
            Vehicle::TYPE_VAN,
            Vehicle::TYPE_BUS,
            Vehicle::TYPE_SUV,
            Vehicle::TYPE_MINIVAN,
        ];

        $year = fake()->year();
        $month = strtoupper(date('M', strtotime(fake()->date())));
        $lastRegistration = "{$year} {$month}";

        return [
            'citizen_id' => Citizen::factory(),
            'make' => fake()->randomElement($makes),
            'model' => fake()->word(),
            'registration_number' => strtoupper(fake()->bothify('WP-???-####')),
            'year_of_manufacture' => fake()->year(),
            'type' => fake()->randomElement($types),
            'color' => fake()->randomElement($colors),
            'color_code' => fake()->hexColor(),
            'seat_capacity' => fake()->numberBetween(1, 5),
            'fuel_type' => fake()->randomElement(['Petrol', 'Diesel', 'Electric', 'Hybrid']),
            'last_registration' => $lastRegistration,
            'is_active' => fake()->boolean(90),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Vehicle $vehicle) {
            $vehicle->etc()->firstOrCreate(
                ['account_number' => 'ETC-' . strtoupper(str()->random(3)) . '-' . rand(1000, 9999)],
                [
                    'charge_type' => 'HIGHWAY',
                    'amount' => 120.50,
                    'status' => 'ACTIVE',
                    'effective_from' => now()->subDays(7)->format('Y-m-d'),
                    'effective_to' => now()->addYears(1)->format('Y-m-d'),
                ]
            );
        });
    }
}
