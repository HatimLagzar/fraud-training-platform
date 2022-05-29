<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuestionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'content'    => ['required', 'string'],
            'replies.*'  => ['required', 'string'],
            'correct_reply_index' => ['required', 'numeric', 'min:0']
        ];
    }
}
