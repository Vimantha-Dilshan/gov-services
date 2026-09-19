<?php

namespace Tests\Feature;

use App\Models\Citizen;
use App\Models\PoliceRecord;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CitizenPoliceRecordTest extends TestCase
{
    use RefreshDatabase;

    public function test_citizen_response_includes_police_records_when_requested(): void
    {
        $citizen = Citizen::factory()->create();

        PoliceRecord::factory()->create([
            'citizen_id' => $citizen->id,
            'record_number' => 'PR1001',
            'record_type' => 'COMPLAINT',
            'status' => 'OPEN',
        ]);

        $response = $this->getJson('/api/v1/human-resources/citizens/' . $citizen->id . '?include=policeRecords');

        $response->assertOk()
            ->assertJsonPath('policeRecords.0.recordNumber', 'PR1001')
            ->assertJsonPath('policeRecords.0.recordType', 'COMPLAINT')
            ->assertJsonPath('policeRecords.0.status', 'OPEN');
    }
}
