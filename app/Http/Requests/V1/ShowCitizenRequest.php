<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ShowCitizenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'include' => [
                'nullable',
                'array',
            ],

            'include.*' => [
                'nullable',
                Rule::in([
                    'driversLicense',
                    'passport',
                    'vehicles',
                    'policeRecords',
                ]),
            ],
        ];
    }

    protected function prepareForValidation()
    {
        if (is_string($this->include)) {
            $this->merge([
                'include' => explode(',', $this->include),
            ]);
        }
    }
}
