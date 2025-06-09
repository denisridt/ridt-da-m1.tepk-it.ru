<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'material_type_id' => 'required|integer|exists:material_types,id',
            'unit_id' => 'required|integer|exists:units,id',
            'price' => 'required|numeric|min:0',
            'warehouse' => 'required|numeric|min:0',
            'minimum' => 'required|numeric|min:0',
            'packaging' => 'required|numeric|min:0',
        ];
    }
}

