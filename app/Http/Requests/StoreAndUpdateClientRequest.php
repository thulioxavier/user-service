<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAndUpdateClientRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule' 'array<mixed>|string>
     */
    public function rules(): array
    {

        $rules = [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:clients,email',
            'cpf' => 'required|string|unique:clients,cpf',
            'birthdate' => 'required|date',
            'active' => 'nullable|in:on',

            'zipcode' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'street_number' => 'required|string|max:255',
        ];

        if ($this->method() === 'PUT') {
            $rules['email'] = [
                'required', 'email', "unique:clients,email,{$this->id},id",
            ];
            $rules['cpf'] = [
                'required', 'string', "unique:clients,cpf,{$this->id},id",
            ];
        };

        return  $rules;
    }
}
