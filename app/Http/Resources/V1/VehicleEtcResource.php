<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class VehicleEtcResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'accountNumber' => Str::upper($this->account_number),
            'chargeType' => Str::upper($this->charge_type),
            'amount' => (float) $this->amount,
            'status' => Str::upper($this->status),
            'effectiveFrom' => $this->effective_from,
            'effectiveTo' => $this->effective_to,
        ];
    }
}
