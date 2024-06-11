<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageValidationRequest extends FormRequest
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
            'title.en' => ['required', 'string'],
            'title.ne' => ['required', 'string'],
            'content.en' => ['required', 'string'],
            'content.ne' => ['required', 'string'],
            'image' => ['nullable'],
            'slug' => Request()->method=='PUT'? 'required | string' : 'nullable',
        ];
    }
}
