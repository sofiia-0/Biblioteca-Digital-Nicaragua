<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->usuario_id,
            'nombre'    => $this->nombre,
            'apellido'  => $this->apellido,
            'email'     => $this->email,
            'tipo'      => $this->tipo,
            'created_at'=> $this->created_at,
            'updated_at'=> $this->updated_at,
        ];
    }
}
