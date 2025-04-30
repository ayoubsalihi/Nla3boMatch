<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            "email" => ["required","email"],
            "password" => ["required","string","min:8"],
            "nom" => ["required","string","max:255"],
            "prenom" => ["required","string"],
            "cin" => ["required","string"],
            "type_utilisateur" => ["required", "string", "in:admin,player"],
            "telephone" => ["required","string"],
            "ville_residence" => ["required","string"],
            "quartier" => ["required","string"],
        ];
    }
}
