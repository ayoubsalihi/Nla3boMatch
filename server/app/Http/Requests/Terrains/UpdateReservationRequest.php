<?php

namespace App\Http\Requests\Terrains;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
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
            'start_time' => 'sometimes|date',
            'end_time' => 'sometimes|date|after:start_time',
            'status' => 'sometimes|in:en attente,confirmé,abandonnée',
            'terrain_id' => 'sometimes|exists:terrains,id',
            'reservable_type' => 'sometimes|string',
            'reservable_id' => 'sometimes|integer',
        ];
    }
    
}
