<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string'
            ],
            'editor' => [
                'required',
                'string'
            ],
            'tags' => [
                'required',
                'string'
            ],
            'file' => [
                'required',
                'file'
            ]
        ];
    }
}
