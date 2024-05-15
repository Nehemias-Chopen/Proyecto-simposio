<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeminaristaRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'tema' => 'required|string|max:250',
            'telefono' => 'required|string|max:15',
            'viaticos' => 'required|numeric|min:0',
            'hoja_vida' => 'required|string',
        ];
    }
}