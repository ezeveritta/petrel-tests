<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoRol extends Model
{
    use HasFactory;

    protected $fillable = ['permiso_id', 'rol_id'];
    protected $table = 'permiso_rol';

    public function permiso()
    {
        return $this->hasOne(Permiso::class);
    }

    public function rol()
    {
        return $this->hasOne(Rol::class);
    }
}
