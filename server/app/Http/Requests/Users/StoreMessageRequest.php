<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            "message" => ["required", "string", "max:255"],
            "sender_id" => ["required", "integer", "exists:users,id"],
            "chat_id" => ["sometimes", "integer", "exists:chats,id"],
            "team_chat_id" => ["sometimes", "integer", "exists:team_chats,id"],
            
        ];
    }
}
