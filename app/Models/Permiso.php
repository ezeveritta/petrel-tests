<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion'];

    public function roles()
    {
        return $this->belongsToMany(Rol::class);
    }
}
