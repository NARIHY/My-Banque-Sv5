<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbonementCompteBancaireRequest extends FormRequest
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
            'cin' => ['required', 'size:12'],
            'code_secret' => ['required', 'same:confirmation_code_secret','size:8'],
            'addresse' => ['required', 'min:3']
        ];
    }
}
