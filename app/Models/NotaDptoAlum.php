<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaDptoAlum extends Model
{
    use HasFactory;
    /*
    $table->id('id_nota_dpto');
    $table->text('descripcion_dto_alum');
    $table->string('url_pdf_nota_dpto_alum');*/
    
    protected $fillable = ['descripcion_dto_alum', 'url_pdf_nota_dpto_alum'];
}
