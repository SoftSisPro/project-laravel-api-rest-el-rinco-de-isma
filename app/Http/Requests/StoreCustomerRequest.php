<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Obtener el usuario autenticado
        $user = auth()->user();
        // Verificar si el usuario tiene un token con el permiso 'create'
        return $user && $user->tokenCan('create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'type' => ['required', 'string', Rule::in(['I','i','B','b'])],
            'email' => ['required', 'string', 'email', 'unique:customers'],
            'phone' => ['required', 'digits:10'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state' => ['required', 'string'],
            'postalCode' => ['required', 'string'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => ucwords($this->name),
            'city' => ucwords($this->city),
            'state' => ucwords($this->state),
            'postal_code' => strtoupper($this->postalCode),
        ]);
    }
}
