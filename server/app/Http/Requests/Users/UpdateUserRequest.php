<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "email" => ["sometimes", "email"],
            "password" => ["sometimes", "string", "min:8", "confirmed"],
            "nom" => ["sometimes", "string"],
            "prenom" => ["sometimes", "string"],
            "cin" => ["sometimes", "string"],
            "type_utilisateur" => ["sometimes", "string", "in:admin,player"],
            "telephone" => ["sometimes", "string"],
            "ville_residence" => ["sometimes", "string"],
            "quartier" => ["sometimes", "string"],
        ];
    }
}
