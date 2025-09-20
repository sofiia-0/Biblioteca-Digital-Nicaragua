<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class PrestamoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                     => $this->prestamo_id,
            'libro'                  => $this->libro ? [
                'id'     => $this->libro->libro_id,
                'titulo' => $this->libro->titulo,
                'autor'  => $this->libro->autor,
            ] : null,
            'usuario'                => $this->usuario ? [
                'id'       => $this->usuario->usuario_id,
                'nombre'   => $this->usuario->nombre,
                'apellido' => $this->usuario->apellido,
                'email'    => $this->usuario->email,
            ] : null,
            'fecha_prestamo'         => $this->fecha_prestamo,
            'fecha_devolucion_esperada' => $this->fecha_devolucion_esperada,
            'fecha_devolucion_real'  => $this->fecha_devolucion_real,
            'estado'                 => $this->estado,
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,
        ];
    }
}