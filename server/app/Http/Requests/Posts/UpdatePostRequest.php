<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'description' => 'sometimes|string|max:500',
            'type_post' => 'sometimes|string|max:255',
            'user_id' => 'sometimes|exists:users,id',
            'partido_id' => 'sometimes|exists:partidos,id',
            'competition_id' => 'sometimes|exists:competitions,id',
        ];
    }
}
