<?php

namespace App\Actions\V1\HumanResources\Citizens;

use App\Models\Citizen;
use Closure;

class FetchCitizenAction
{
    public function handle(array $payload, Closure $next)
    {
        $id = $payload['id'] ?? null;

        $citizen = Citizen::findOrFail($id);

        return $next([
            'citizen' => $citizen,
            'include' => $payload['include'] ?? [],
        ]);
    }
}
