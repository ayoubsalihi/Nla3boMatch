<?php

namespace App\Http\Requests\Teams;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupTeamRequest extends FormRequest
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
            "points" => "required|integer|default:0",
            "Gf" => "required|integer|default:0",
            "GA" => "required|integer|default:0",
            "GD" => "required|integer|default:0",
            "team_id" => "required|exists:teams,id",
        ];
    }
}
