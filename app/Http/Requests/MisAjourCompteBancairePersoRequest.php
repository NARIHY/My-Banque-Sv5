<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MisAjourCompteBancairePersoRequest extends FormRequest
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
            'addresse' => ['min:3', 'max:255'],
            'compte_bancaire_categorie_id' => ['required', 'exists:compte_bancaire_categories,id'],
            'ancien_code_secret' => ['nullable','size:8'],
            'code_secret' => ['nullable','required_with:ancien_code_secret', 'confirmed','size:8'],
        ];
    }
}
