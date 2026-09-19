<?php

namespace Database\Seeders;

use App\Models\Passport;
use Illuminate\Database\Seeder;

class PassportSeeder extends Seeder
{
    public function run(): void
    {
        Passport::factory()->count(50)->create();
    }
}
