<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  

class Usuario extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'usuarios';

    // Clave primaria
    protected $primaryKey = 'usuario_id';

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'password',
        'tipo',
    ];

    // Ocultar password en JSON
    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        if ($value && strlen($value) < 60) {
            $this->attributes['password'] = bcrypt($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }
}
