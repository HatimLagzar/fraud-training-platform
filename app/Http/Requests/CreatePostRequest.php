<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'          => ['required', 'string', 'min:1', 'max:255'],
            'description'    => ['required', 'string'],
            'title_fr'       => ['required', 'string', 'min:1', 'max:255'],
            'description_fr' => ['required', 'string'],
            'title_es'       => ['required', 'string', 'min:1', 'max:255'],
            'description_es' => ['required', 'string'],
            'title_it'       => ['required', 'string', 'min:1', 'max:255'],
            'description_it' => ['required', 'string'],
            'title_de'       => ['required', 'string', 'min:1', 'max:255'],
            'description_de' => ['required', 'string'],
            'thumbnail'      => ['required', 'image', 'max:10000'],
            'country_id'     => ['nullable', 'numeric'],
        ];
    }
}
