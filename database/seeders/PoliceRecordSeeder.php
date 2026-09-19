<?php

namespace Database\Seeders;

use App\Models\PoliceRecord;
use Illuminate\Database\Seeder;

class PoliceRecordSeeder extends Seeder
{
    public function run(): void
    {
        PoliceRecord::factory()->count(50)->create();
    }
}
