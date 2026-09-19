<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PoliceRecordResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'recordNumber' => Str::upper($this->record_number),
            'caseNumber' => Str::upper($this->case_number),
            'recordType' => Str::upper($this->record_type),
            'incidentDate' => $this->incident_date?->format('Y-m-d'),
            'reportedDate' => $this->reported_date?->format('Y-m-d'),
            'policeStation' => Str::upper($this->police_station),
            'description' => $this->description,
            'officerName' => Str::upper($this->officer_name),
            'status' => Str::upper($this->status),
            'outcome' => Str::upper($this->outcome),
            'isActive' => $this->is_active,
        ];
    }
}
