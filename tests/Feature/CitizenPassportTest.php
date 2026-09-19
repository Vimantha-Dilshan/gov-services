<?php

namespace Tests\Feature;

use App\Models\Citizen;
use App\Models\Passport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CitizenPassportTest extends TestCase
{
    use RefreshDatabase;

    public function test_citizen_response_includes_passport_when_requested(): void
    {
        $citizen = Citizen::factory()->create();

        Passport::factory()->create([
            'citizen_id' => $citizen->id,
            'passport_number' => 'P1234567',
            'nationality' => 'LKA',
            'status' => 'ACTIVE',
        ]);

        $response = $this->getJson('/api/v1/human-resources/citizens/' . $citizen->id . '?include=passport');

        $response->assertOk()
            ->assertJsonPath('passport.passportNumber', 'P1234567')
            ->assertJsonPath('passport.nationality', 'LKA')
            ->assertJsonPath('passport.status', 'ACTIVE');
    }

    public function test_passport_include_is_validated(): void
    {
        $citizen = Citizen::factory()->create();

        $this->getJson('/api/v1/human-resources/citizens/' . $citizen->id . '?include=unknown')
            ->assertUnprocessable();
    }
}
