<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConversionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'genres' => 'string',
            'themes' => 'string',
            'length' => 'string',
            'tempo' => 'string',
            'mood' => 'string',
            'is_favorite' => 'boolean',
        ];

        // If the request method is POST, remove the 'is_favorite' rule
        if ($this->isMethod('post')) {
            unset($rules['is_favorite']);
            $rules = array_map(function ($rule) {
                return $rule . '|required';
            }, $rules);
        }

        return $rules;
    }
}
