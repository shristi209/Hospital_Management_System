<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorEducationRequest extends FormRequest
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

            'institute_name.*' => ['required'],
            'specialization.*' => ['required'],
            'graduation_year_start_bs.*' => ['required', 'date'],
            'graduation_year_start_ad.*' => ['required', 'date'],
            'education_level.*'=>['required'],
            
        ];
    }
}
