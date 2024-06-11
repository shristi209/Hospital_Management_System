<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentPatientValidationRequest extends FormRequest
{

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
            'schedule_id'=>['required', 'integer'],
            'time_interval' =>['required'],
            'full_name' => ['required','string'],
            'gender' => ['required', 'string'],
            'date_of_birth' => ['required','date'],
            'temporary_address' => ['required','string'],
            'permanent_address' => ['required', 'string'],
            'phone' => ['required','min:9'],
            'email' => ['required', 'email'],
            'parents_name' => ['required','string'],

            'appointment_message' => ['nullable','string'],
            'medical_history' => ['nullable'],
            'reason'=>['nullable', 'string'],
        ];
    }
}
