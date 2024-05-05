<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorValidationRequest extends FormRequest
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
            'department_id' => ['required'],
            'first_name' => ['required', 'string'],
            'middle_name' => ['nullable', 'string'],
            'last_name' => ['required', 'string'],
            'gender' => ['required', 'string'],

            'photo' => ['nullable'],
            'dob_bs' => ['required', 'date'],
            'dob_ad' => ['nullable', 'date'],
            'licence_no' => ['required', 'string'],
            'phone_num' => ['required'],

            'country_id' => ['required', 'string'],
            'province_id' => ['required', 'string'],
            'district_id' => ['required', 'string'],
            'municipality_id' => ['required', 'string'],
            'street' => ['required', 'string'],

            'temp_country_id' => ['nullable', 'string'],
            'temp_province_id' => ['nullable', 'string'],
            'temp_district_id' => ['nullable', 'string'],
            'temp_municipality_id' => ['nullable', 'string'],
            'temp_street' => ['nullable', 'string'],

            'institute_name.*' => ['required'],
            'specialization.*' => ['required'],
            'graduation_year_start_bs.*' => ['required', 'date'],
            'graduation_year_start_ad.*' => ['required', 'date'],
            'education_level.*'=>['required'],

            'organization_name.*' => ['required'],
            'org_start_bs.*' => ['required', 'date'],
            'org_start_ad.*' => ['required', 'date'],
            'org_end_bs.*' => ['required', 'date'],
            'org_end_ad.*' => ['required', 'date'],
            'description.*' => ['nullable'],

            'password'=>  Request()->method == 'POST' ? 'required|string|min:4|confirmed' : 'nullable',
            'email'=> Request()->method == 'POST' ? 'required|string|unique:users' : 'nullable',
        ];
    }
}
