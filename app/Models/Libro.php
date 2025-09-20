<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = "Libros";
    protected $primarykey = "libro_id";
    protected $fillable = [
        'titulo',
        'autor',
        'isbn',
        'anio_publicacion',
        'editorial',
        'cantidad_ejemplares',
        'cantidad_disponible',
        'estado',
        'imagen_url',
        'created_at',
        'updated_at'
    ];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'libro_id', 'libro_id');
    }
}
