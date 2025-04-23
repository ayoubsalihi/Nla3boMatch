<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoalkeeperRequest extends FormRequest
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
            "diving" => ["required", "integer", "between:0,100"],
            "reflex" => ["required","integer","between:0,100"],
            "kicking" => ["required","integer","between:0,100"],
            "handling" => ["required","integer","between:0,100"],
            "positionning" => ["required","integer","between:0,100"],
            "speed" => ["required","integer","between:0,100"],
            "user_id" => ["required","integer","exists:users,id"],
        ];
    }
}
