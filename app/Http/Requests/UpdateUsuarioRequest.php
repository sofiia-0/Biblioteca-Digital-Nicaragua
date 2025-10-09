<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
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
        $usuariomodel = $this->route('usuario');
        $usuarioId = Is_Object($usuariomodel) ? $usuariomodel->usuario_id : $usuariomodel;
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
            'password' => 'required|string|max:6',
            'tipo' => 'sometimes|in:estudiante,docente,publico'
        ];
    }

}