<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuvenirRequest extends FormRequest
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
     * @return array \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'precio' => 'required|numeric|min:0',
        ];
    }
}