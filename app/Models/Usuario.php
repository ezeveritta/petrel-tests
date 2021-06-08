<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['legajo', 'nombre', 'apellido', 'email', 'contrasenia'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class);
    }
}
