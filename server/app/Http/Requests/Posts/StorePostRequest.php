<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description' => 'required|string|max:500',
            'type_post' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'partido_id' => 'required|exists:partidos,id',
            'competition_id' => 'required|exists:competitions,id',
        ];
    }
}
