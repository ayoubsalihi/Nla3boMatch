<?php

namespace App\Http\Requests\Competitions;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartidoRequest extends FormRequest
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
            'type_match' => 'sometimes|required|string|max:255',
            'level_match' => 'sometimes|required|string|max:255',
            'result' => 'nullable|string|max:255',
            'round' => 'sometimes|required|string|in:group_stage,quarter_final,semi_final,final',
            'competition_id' => 'sometimes|required|exists:competitions,id',
            'team1_id' => 'sometimes|required|exists:teams,id|different:team2_id',
            'team2_id' => 'sometimes|required|exists:teams,id',
            'terrain_id' => 'sometimes|required|exists:terrains,id',
        ];
    }
}
