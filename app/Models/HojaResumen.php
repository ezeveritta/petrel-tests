<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaResumen extends Model
{
    use HasFactory;

    protected $table = 'hojas_resumen';
    protected $fillable = [
        'url_pdf_rendimiento_acad', 
        'url_pdf_plan_estudio',
        'url_pdf_programas',
        'url_pdf_nota_dpto_alum',
        'url_pdf_hoja_unida'
    ];

    public function programas()
    {
        return $this->belongsToMany(Programa::class);
    }
}
