<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            "email" => ["required", "email"],
            "password" => ["required", "string", "min:8"],
            "nom" => ["required", "string"],
            "prenom" => ["required", "string"],
            "cin" => ["required", "string"],
            "type_utilisateur" => ["required", "string", "in:admin,player"],
            "telephone" => ["required", "string"],
            "ville_residence" => ["required", "string"],
            "quartier" => ["required", "string"],

            // for player
            "poste" => ["required_if:type_utilisateur,player", "string", "max:255"],
            // if poste = GK
            "diving" => ["required_if:poste,GK", "integer", "between:0,100"],
            "handling" => ["required_if:poste,GK", "integer", "between:0,100"],
            "reflex" => ["required_if:poste,GK", "integer", "between:0,100"],
            "kicking" => ["required_if:poste,GK", "integer", "between:0,100"],
            "positionning" => ["required_if:poste,GK", "integer", "between:0,100"],
            "speed" => ["required_if:poste,GK", "integer", "between:0,100"],

            // if poste != GK
            "pace" => ["required_unless:poste,GK", "integer", "between:0,100"],
            "dribbling" => ["required_unless:poste,GK", "integer", "between:0,100"],
            "shooting" => ["required_unless:poste,GK", "integer", "between:0,100"],
            "defending" => ["required_unless:poste,GK", "integer", "between:0,100"],
            "passing" => ["required_unless:poste,GK", "integer", "between:0,100"],
            "physical" => ["required_unless:poste,GK", "integer", "between:0,100"],
        ];
    }
}
