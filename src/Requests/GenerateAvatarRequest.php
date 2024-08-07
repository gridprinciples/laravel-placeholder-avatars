<?php

namespace GridPrinciples\PlaceholderAvatars\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class GenerateAvatarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:64'],
            'size' => ['integer', 'min:32', 'max:2048'],
            'colors' => ['array'],
            'square' => ['boolean'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        abort(404);
    }
}