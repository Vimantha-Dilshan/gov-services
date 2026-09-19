<?php

namespace App\Actions\V1\HumanResources\Citizens;

use Closure;

class IncludeCitizenRelationsAction
{
    public function handle(array $payload, Closure $next)
    {
        $citizen = $payload['citizen'];
        $include = $payload['include'];

        $relations = [];

        if (in_array('driversLicense', $include)) {
            $relations[] = 'driverLicenses';
        }

        if (in_array('passport', $include)) {
            $relations[] = 'passport';
        }

        if (in_array('vehicles', $include)) {
            $relations[] = 'vehicles';
            $relations[] = 'vehicles.etc';
        }

        if (!empty($relations)) {
            $citizen->load($relations);
        }

        return $next($citizen);
    }
}
