<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceClientContacteRequest extends FormRequest
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
            'sujet_conversation' => ['required', 'min:3', 'max:255'],
            'introduction_lettre' => ['required', 'min:10'],
            'contenu_lettre' => ['required','min:10'],
            'conclusion_lettre' => ['required','min:10'],
        ];
    }
}
