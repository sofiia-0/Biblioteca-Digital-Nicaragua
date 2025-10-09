<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUsuarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $usuarioModel = $this->route('usuario');
        $usuarioId = is_object($usuarioModel) ? $usuarioModel->usuario_id : $usuarioModel;

        return [
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => [
                'sometimes',
                'required',
                'email',
                'max:100',
                Rule::unique('usuarios', 'email')->ignore($usuarioId, 'usuario_id')
            ],
            'password' => 'required|string|min:6|max:255',
            'tipo' => 'sometimes|in:estudiante,docente,publico'
        ];
    }
}
