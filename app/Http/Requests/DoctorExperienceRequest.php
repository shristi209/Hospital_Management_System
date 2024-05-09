<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorExperienceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'organization_name.*' => ['required'],
            'org_start_bs.*' => ['required', 'date'],
            'org_start_ad.*' => ['required', 'date'],
            'org_end_bs.*' => ['required', 'date'],
            'org_end_ad.*' => ['required', 'date'],
            'description.*' => ['nullable'],
        ];
    }
}
