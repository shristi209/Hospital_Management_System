<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class MenuValidationRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'menu.en' => 'required',
            'menu.ne' => 'required',
            'menu_type' => 'required',
            'page_id' => 'nullable|integer',
            'modal_id' => 'nullable|integer',
            'link' => 'nullable|string',
            'parent_id' => 'nullable|integer',
            'display_order' => 'required|integer',
            'status' => 'required',
        ];

    }
}
