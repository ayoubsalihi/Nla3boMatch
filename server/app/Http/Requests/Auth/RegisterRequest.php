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
            "nom" => ["required", "string", "max:255"],
            "prenom" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "max:255", "unique:users"],
            "password" => ["required", "string", "min:8", "confirmed"],
            "cin" => ["required", "string", "max:255", "unique:users"],
            "type_utilisateur" => ["required", "string", "in:player,admin"],
            "telephone" => ["required", "string", "regex:/^\+212[0-9]{9}$/"],
            "ville_residence" => ["required", "string", "max:255"],
            "quartier" => ["required", "string", "max:255"],
            "poste" => ["required_if:type_utilisateur,player", "string", "max:255"],
            
            // Goalkeeper specific
            "diving" => ["required_if:poste,GK", "integer", "between:0,100"],
            "reflex" => ["required_if:poste,GK", "integer", "between:0,100"],
            "handling" => ["required_if:poste,GK", "integer", "between:0,100"],
            "kicking" => ["required_if:poste,GK", "integer", "between:0,100"],
            "positionning" => ["required_if:poste,GK", "integer", "between:0,100"],
            "speed" => ["required_if:poste,GK", "integer", "between:0,100"],
            
            // Field player
            "pace" => ["required_unless:poste,GK", "integer", "between:0,100"],
            "dribbling" => ["required_unless:poste,GK", "integer", "between:0,100"],
            "shooting" => ["required_unless:poste,GK", "integer", "between:0,100"],
            "defending" => ["required_unless:poste,GK", "integer", "between:0,100"],
            "passing" => ["required_unless:poste,GK", "integer", "between:0,100"],
            "physical" => ["required_unless:poste,GK", "integer", "between:0,100"],
        ];
    }
}
