<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentPatientValidationRequest extends FormRequest
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
            'schedule_id'=>['required'],
            'time_interval' =>['required'],
            'full_name' => ['required','string'],
            'gender' => ['required', 'string'],
            'date_of_birth' => ['required','date'],
            'temporary_address' => ['required','string'],
            'permanent_address' => ['required', 'string'],
            'phone' => ['required'],
            'email' => ['required', 'email'],
            'parents_name' => ['required','string'],
            'appointment_message' => ['required','string'],
            'medical_history' => ['required'],

            'reason'=>['required', 'string'],
        ];
    }
}
