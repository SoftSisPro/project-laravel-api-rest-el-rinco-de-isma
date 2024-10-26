<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Obtener el usuario autenticado
        $user = auth()->user();
        // Verificar si el usuario tiene un token con el permiso 'update'
        return $user && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if($method == 'PUT'){
            return [
                'name' => ['required', 'string'],
                'type' => ['required', 'string', Rule::in(['I','i','B','b'])],
                'email' => ['required', 'string', 'email', Rule::unique('customers')->ignore($this->customer)],
                'phone' => ['required', 'digits:10'],
                'address' => ['required', 'string'],
                'city' => ['required', 'string'],
                'state' => ['required', 'string'],
                'postalCode' => ['required', 'string'],
            ];
        }else{
            return [
                'name' => ['sometimes', 'string'],
                'type' => ['sometimes', 'string', Rule::in(['I','i','B','b'])],
                'email' => ['sometimes', 'string', 'email', Rule::unique('customers')->ignore($this->customer)],
                'phone' => ['sometimes', 'digits:10'],
                'address' => ['sometimes', 'string'],
                'city' => ['sometimes', 'string'],
                'state' => ['sometimes', 'string'],
                'postalCode' => ['sometimes', 'string'],
            ];
        }
    }

    protected function prepareForValidation()
    {
        $fieldsToUpper = ['postalCode', 'name', 'city', 'state'];

        foreach ($fieldsToUpper as $field) {
            if ($this->has($field)) {
                $this->merge([
                    $field => $field === 'postalCode' ? strtoupper($this->$field) : ucwords($this->$field),
                ]);
            }
        }
    }
}
