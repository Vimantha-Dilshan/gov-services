<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class VehicleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'make' => Str::upper($this->make),
            'model' => Str::upper($this->model),
            'registrationNumber' => Str::upper($this->registration_number),
            'yearOfManufacture' => $this->year_of_manufacture,
            'type' => Str::upper($this->type),
            'color' => Str::upper($this->color),
            'colorCode' => Str::upper($this->color_code),
            'seatCapacity' => $this->seat_capacity,
            'fuelType' => Str::upper($this->fuel_type),
            'lastRegistration' => Str::upper($this->last_registration),
            'isActive' => $this->is_active,
            'etc' => $this->whenLoaded('etc', fn () => VehicleEtcResource::collection($this->etc), fn () => []),
        ];
    }
}
