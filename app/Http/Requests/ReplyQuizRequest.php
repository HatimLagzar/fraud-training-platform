<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplyQuizRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'reply_id' => ['required', 'numeric', 'min:1']
        ];
    }
}
