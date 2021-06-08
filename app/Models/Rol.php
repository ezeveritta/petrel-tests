<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion'];
    protected $table = 'roles';

    public function permisos()
    {
        return $this->belongsToMany(Permiso::class);
    }

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class);
    }
}
