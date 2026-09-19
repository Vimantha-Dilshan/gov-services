<?php

namespace Database\Seeders;

use App\Models\DriverLicense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverLicenseSeeder extends Seeder
{
    public function run(): void
    {
        DriverLicense::factory()->count(50)->create();
    }
}
