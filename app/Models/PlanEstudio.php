<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanEstudio extends Model
{
    use HasFactory;

    protected $fillable = ['anio', 'nro_ordenanza', 'nro_gestion', 'gestion', 'url'];

    
}
