<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LibroResource extends JsonResource
{
    
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->libro_id,
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'isbn' => $this->isbn,
            'anio_publicacion' => $this->anio_publicacion,
            'editorial' => $this->editorial,
            'cantidad_ejemplares' => $this->cantidad_ejemplares,
            'cantidad_disponible' => $this->cantidad_disponible,
            'estado' => $this->estado,
            'imagen_url' => $this->imagen_url,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
