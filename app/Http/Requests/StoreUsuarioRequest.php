<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:usuarios,email',
            'password' => 'required|string|min:6|max:255',
            'tipo' => 'sometimes|in:estudiante,docente,publico'
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'El correo electrónico ya está en uso.',
            'tipo.in' => 'El tipo de usuario debe ser estudiante, docente o publico.'
        ];
    }
}
