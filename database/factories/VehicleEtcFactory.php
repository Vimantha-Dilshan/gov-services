<?php

namespace Database\Factories;

use App\Models\Vehicle;
use App\Models\VehicleEtc;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleEtcFactory extends Factory
{
    protected $model = VehicleEtc::class;

    public function definition(): array
    {
        return [
            'vehicle_id' => Vehicle::factory(),
            'account_number' => 'ETC-' . strtoupper(fake()->bothify('###??')),
            'charge_type' => fake()->randomElement([
                VehicleEtc::TYPE_HIGHWAY,
                VehicleEtc::TYPE_EXPRESSWAY,
                VehicleEtc::TYPE_MOTORWAY,
            ]),
            'amount' => fake()->randomFloat(2, 50, 500),
            'status' => fake()->randomElement(VehicleEtc::STATUSES),
            'effective_from' => now()->subDays(rand(1, 365))->format('Y-m-d'),
            'effective_to' => now()->addDays(rand(30, 365))->format('Y-m-d'),
        ];
    }
}
