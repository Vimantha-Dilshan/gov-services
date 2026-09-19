<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PassportResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'passportNumber' => Str::upper($this->passport_number),
            'passportType' => Str::upper($this->passport_type),
            'nationality' => Str::upper($this->nationality),
            'dateOfBirth' => $this->date_of_birth?->format('Y-m-d'),
            'placeOfBirth' => Str::upper($this->place_of_birth),
            'sex' => Str::upper($this->sex),
            'issuedDate' => $this->issued_date?->format('Y-m-d'),
            'expiryDate' => $this->expiry_date?->format('Y-m-d'),
            'issuingAuthority' => Str::upper($this->issuing_authority),
            'status' => Str::upper($this->status),
            'isActive' => $this->is_active,
        ];
    }
}
