<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVideoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file' => 'sometimes|file|mimes:mp4,mov,avi|max:51200',
            'post_id' => 'sometimes|exists:posts,id',
        ];
    }
}
