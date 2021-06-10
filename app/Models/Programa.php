<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_materia', 'numero_materia', 'carrera', 'anio', 'url'];
    protected $table = 'programas';

    public function hojaResumen()
    {
        return $this->belongsToMany(HojaResumen::class);
    }
}
