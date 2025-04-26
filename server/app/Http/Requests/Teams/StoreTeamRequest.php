<?php

namespace App\Http\Requests\Teams;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeamRequest extends FormRequest
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
            "intitule_team" => "required|string|max:255",
            "type_team" => "required|string|max:255",
            "size_team" => "required|integer|min:3",
            "responsable" => "required|string|max:255",
            "terrain_id"=> "sometimes|exists:terrains,id ",
        ];
    }
}
