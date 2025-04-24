<?php

namespace App\Http\Requests\Competitions;

use Illuminate\Foundation\Http\FormRequest;

class StorePartidoTeamRequest extends FormRequest
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
        'partido_id' => 'required|exists:partidos,id',
        'team_id' => 'required|exists:teams,id',
    ];
}

}
