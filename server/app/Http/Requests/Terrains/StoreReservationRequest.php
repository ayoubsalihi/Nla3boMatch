<?php

namespace App\Http\Requests\Terrains;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
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
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'status' => 'required|in:en attente,confirmé,abandonnée',
            'terrain_id' => 'required|exists:terrains,id',
            'reservable_type' => 'required|string',
            'reservable_id' => 'required|integer',
        ];
    }
    
    
}
