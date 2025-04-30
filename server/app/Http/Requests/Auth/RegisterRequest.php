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
        return false;
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
            "password" => ["required", "string", "min:8","confirmed"],
            "nom" => ["required", "string"],
            "prenom" => ["required", "string"],
            "cin" => ["required", "string"],
            "type_utilisateur" => ["required", "string", "in:admin,player"],
            "telephone" => ["required", "string"],
            "ville_residence" => ["required", "string"],
            "quartier" => ["required", "string"],

            // for player
            "poste" => ["required", "string", "max:255"],
            // if poste = GK
            "diving" => ["required_if:poste,GK", "integer", "between:0,100"],
            "handling" => ["required_if:poste,GK", "integer", "between:0,100"],
            "reflex" => ["required_if:poste,GK", "integer", "between:0,100"],
            "kicking" => ["required_if:poste,GK", "integer", "between:0,100"],
            "positionning" => ["required_if:poste,GK", "integer", "between:0,100"],
            "speed" => ["required_if:poste,GK", "integer", "between:0,100"],

            // if poste != GK
            "pace" => ["required_if:poste,!=,GK", "integer", "between:0,100"],
            "dribbling" => ["required_if:poste,!=,GK", "integer", "between:0,100"],
            "shooting" => ["required_if:poste,!=,GK", "integer", "between:0,100"],
            "defending" => ["required_if:poste,!=,GK", "integer", "between:0,100"],
            "passing" => ["required_if:poste,!=,GK", "integer", "between:0,100"],
            "physical" => ["required_if:poste,!=,GK", "integer", "between:0,100"],
        ];
    }
}
