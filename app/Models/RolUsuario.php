<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolUsuario extends Model
{
    use HasFactory;
    protected $fillable = ['usuario_legajo', 'rol_id'];
    protected $table = 'rol_usuario';

    public function usuario()
    {
        return $this->hasOne(Usuario::class);
    }

    public function rol()
    {
        return $this->hasOne(Rol::class);
    }
}
