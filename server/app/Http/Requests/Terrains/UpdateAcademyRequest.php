<?php

namespace App\Http\Requests\Terrains;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAcademyRequest extends FormRequest
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
            'name_academy' => 'sometimes|string|max:255',
            'reference' => 'sometimes|string|unique:academies,reference,' . $this->academy,
            'responsable' => 'sometimes|string|max:255',
            'type_academy' => 'sometimes|string|max:255',
            'terrain_id' => 'sometimes|exists:terrains,id',
        ];
    }
    

}
