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
        return [
            'genres' => 'required',
            'themes' => 'required',
            'length' => 'required',
            'tempo' => 'required',
            'image' => 'required|file|mimes:jpeg,png,jpg,gif',
        ];
    }
}
