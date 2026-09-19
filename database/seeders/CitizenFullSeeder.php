<?php

namespace Database\Seeders;

use App\Models\Citizen;
use Illuminate\Database\Seeder;

class CitizenFullSeeder extends Seeder
{
    public function run(): void
    {
        Citizen::factory()
            ->count(100)
            ->hasDriverLicenses(rand(1, 2))
            ->hasPassport()
            ->hasPoliceRecords(rand(1, 2))
            ->hasVehicles(rand(1, 3))
            ->create();
    }
}
