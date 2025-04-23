<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInsidePlayerRequest extends FormRequest
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
            'pace' => 'required|integer|min:0|max:100',
            'dribbling' => 'required|integer|min:0|max:100',
            'shooting' => 'required|integer|min:0|max:100',
            'defending' => 'required|integer|min:0|max:100',
            'passing' => 'required|integer|min:0|max:100',
            'physical' => 'required|integer|min:0|max:100',
        ];
    }
}
