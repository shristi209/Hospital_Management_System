<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UserValidationRequest extends FormRequest
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
            'username'=>['string','required'],
            //'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',

            'password'=>  Request()->method == 'POST' ? 'required|string|min:4|confirmed' : 'nullable',
            'email'=> Request()->method == 'POST' ? 'required|string|unique:users' : 'nullable',
            'role_id.*' => 'required',
        ];

    }
}
