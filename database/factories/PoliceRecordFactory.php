<?php

namespace Database\Factories;

use App\Models\Citizen;
use App\Models\PoliceRecord;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoliceRecordFactory extends Factory
{
    protected $model = PoliceRecord::class;

    public function definition(): array
    {
        return [
            'citizen_id' => Citizen::factory(),
            'record_number' => strtoupper(fake()->unique()->bothify('PR########')),
            'case_number' => strtoupper(fake()->bothify('CASE-####-####')),
            'record_type' => fake()->randomElement(['COMPLAINT', 'TRAFFIC_OFFENCE', 'CRIMINAL_CASE']),
            'incident_date' => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'reported_date' => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'police_station' => fake()->city . ' Police Station',
            'description' => fake()->sentence(),
            'officer_name' => fake()->name(),
            'status' => fake()->randomElement(PoliceRecord::STATUSES),
            'outcome' => fake()->optional()->sentence(),
            'is_active' => fake()->boolean(90),
        ];
    }
}
