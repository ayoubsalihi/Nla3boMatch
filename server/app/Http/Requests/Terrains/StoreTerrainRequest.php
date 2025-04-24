<?php

namespace App\Http\Requests\Terrains;

use Illuminate\Foundation\Http\FormRequest;

class StoreTerrainRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'intitule_terrain' => 'required|string|max:255',
        ];
    }
    
}
