<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreInsidePlayerRequest extends FormRequest
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
            "pace" => ["required", "integer", "between:0,100"],
            "dribbling" => ['required','integer','between:0,100'],
            'shooting' => ['required','integer','between:0,100'],
            'defending' => ['required','integer','between:0,100'],
            'passing' => ['required','integer','between:0,100'],
            'physical' => ['required','integer','between:0,100'],
            'player_id' => ['required', 'integer', 'exists:players,id']
        ];
    }
}
