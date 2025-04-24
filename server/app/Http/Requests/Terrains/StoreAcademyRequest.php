<?php

namespace App\Http\Requests\Terrains;

use Illuminate\Foundation\Http\FormRequest;

class StoreAcademyRequest extends FormRequest
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
            'name_academy' => 'required|string|max:255',
            'reference' => 'required|string|unique:academies,reference',
            'responsable' => 'required|string|max:255',
            'type_academy' => 'required|string|max:255',
            'terrain_id' => 'required|exists:terrains,id',
        ];
    }
}
