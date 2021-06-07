<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolPermisos extends Model
{
    use HasFactory;

    protected $fillable = ['permiso_id', 'rol_id'];

    public function permiso()
    {
        return $this->hasOne(Permiso::class);
    }

    public function rol()
    {
        return $this->hasOne(Rol::class);
    }
}
