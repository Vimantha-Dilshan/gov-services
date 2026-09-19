<?php

namespace Tests\Feature;

use App\Models\Citizen;
use App\Models\Vehicle;
use App\Models\VehicleEtc;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CitizenVehicleEtcTest extends TestCase
{
    use RefreshDatabase;

    public function test_citizen_vehicle_response_includes_etc_records(): void
    {
        $citizen = Citizen::factory()->create();

        $vehicle = Vehicle::factory()->create([
            'citizen_id' => $citizen->id,
        ]);

        VehicleEtc::factory()->create([
            'vehicle_id' => $vehicle->id,
            'account_number' => 'ETC-1001',
            'charge_type' => 'HIGHWAY',
            'amount' => 120.50,
            'status' => 'ACTIVE',
        ]);

        $response = $this->getJson('/api/v1/human-resources/citizens/' . $citizen->id . '?include=vehicles');

        $response->assertOk()
            ->assertJsonPath('vehicles.0.etc.0.accountNumber', 'ETC-1001')
            ->assertJsonPath('vehicles.0.etc.0.chargeType', 'HIGHWAY')
            ->assertJsonPath('vehicles.0.etc.0.amount', 120.5);
    }
}
