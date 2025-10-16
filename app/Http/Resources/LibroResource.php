<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibroResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                    => $this->libro_id,
            'titulo'                => $this->titulo,
            'autor'                 => $this->autor,
            'isbn'                  => $this->isbn,
            'anio_publicacion'      => $this->anio_publicacion,
            'editorial'             => $this->editorial,
            'categoria'             => $this->categoria,
            'cantidad_ejemplares'   => $this->cantidad_ejemplares,
            'ejemplares_disponibles' => $this->ejemplares_disponibles,
            'estado'                => $this->estado,
            'imagen_url'            => $this->imagen_url,
        ];
    }
}