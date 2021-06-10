<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaResumenPrograma extends Model
{
    use HasFactory;
    protected $fillable = ['hojaResumen_id', 'programa_id'];
    protected $table = 'hoja_resumen_programa';

    public function programa()
    {
        return $this->hasOne(Programa::class);
    }

    public function hojaResumen()
    {
        return $this->hasOne(HojaResumen::class);
    }
}
