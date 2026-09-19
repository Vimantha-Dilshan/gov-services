<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class DriverLicenseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'licenseNumber' => Str::upper($this->license_number),
            'licenseType' => Str::upper($this->license_type),
            'issuedDate' => $this->issued_date,
            'expiryDate' => $this->expiry_date,
            'issuingAuthority' => Str::upper($this->issuing_authority),
            'status' => Str::upper($this->status),
        ];
    }
}
