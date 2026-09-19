<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\PassportResource;
use App\Http\Resources\V1\PoliceRecordResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CitizenResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nic' => Str::upper($this->nic),
            'name' => [
                'title' => Str::upper($this->title),
                'initials' => Str::upper($this->initials),
                'firstName' => Str::upper($this->first_name),
                'lastName' => Str::upper($this->last_name),
                'surname' => Str::upper($this->surname),
                'initialName' => Str::upper($this->initial_name),
                'fullName' => Str::upper($this->full_name),
            ],
            'dob' => $this->dob?->format('Y-m-d'),
            'gender' => Str::upper($this->gender),
            'contactNumber' => Str::upper($this->contact_number),
            'bloodType' => Str::upper($this->blood_type),
            'occupation' => Str::upper($this->occupation),
            'city' => Str::upper($this->city),
            'permanentAddress' => Str::upper($this->permanent_address),
            $this->mergeWhen(
                in_array('driversLicense', is_array($request->include) ? $request->include : explode(',', $request->include ?? '')),
                [
                    'driversLicense' => DriverLicenseResource::collection($this->whenLoaded('driverLicenses')),
                ]
            ),
            $this->mergeWhen(
                in_array('passport', is_array($request->include) ? $request->include : explode(',', $request->include ?? '')),
                [
                    'passport' => new PassportResource($this->whenLoaded('passport')),
                ]
            ),
            $this->mergeWhen(
                in_array('policeRecords', is_array($request->include) ? $request->include : explode(',', $request->include ?? '')),
                [
                    'policeRecords' => PoliceRecordResource::collection($this->whenLoaded('policeRecords')),
                ]
            ),
            $this->mergeWhen(
                in_array('vehicles', is_array($request->include) ? $request->include : explode(',', $request->include ?? '')),
                [
                    'vehicles' => VehicleResource::collection($this->whenLoaded('vehicles')),
                ]
            )
        ];
    }
}
