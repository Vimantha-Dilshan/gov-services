<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use App\Models\VehicleEtc;
use Illuminate\Database\Seeder;

class VehicleEtcSeeder extends Seeder
{
    public function run(): void
    {
        Vehicle::query()->get()->each(function (Vehicle $vehicle) {
            $count = rand(1, 2);

            for ($i = 0; $i < $count; $i++) {
                $accountNumber = 'ETC-' . strtoupper(str()->random(3)) . '-' . rand(1000, 9999);

                VehicleEtc::query()->firstOrCreate(
                    ['vehicle_id' => $vehicle->id, 'account_number' => $accountNumber],
                    VehicleEtc::factory()->make([
                        'vehicle_id' => $vehicle->id,
                        'account_number' => $accountNumber,
                    ])->toArray()
                );
            }
        });
    }
}
