<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class ProgramaController extends Controller
{

    public static function programas(string $directorio = '', bool $repercusivo = false)
    {
        Collection::macro('nombre', function () {
            return $this->map(fn ($a) => Storage::cloud()->getMetadata($a)['name']);
        });

        return collect(Storage::cloud()->files($directorio, $repercusivo))->nombre();
    }

    public static function cargarProgramasABaseDatos($programas)
    {
        foreach($programas as $programa) {
            
        }
    }


    public static function archivos(string $directorio = '', bool $repercusivo = false, array $opciones = ['todos'],) : array
    {
        $archivos = Storage::cloud()->files($directorio, $repercusivo);

        $tmp_retorno = [];
        foreach($archivos as $archivo) {
            array_push($tmp_retorno, Storage::cloud()->getMetadata($archivo));
        }
        
        $tmp_retorno2 = [];
        foreach($tmp_retorno as $archivo) {
            $arreglo = array();

            if (in_array('name', $opciones) || in_array('todos', $opciones))  $arreglo['name'] = $archivo['name'];

            if (in_array('path', $opciones) || in_array('todos', $opciones)) $arreglo['path'] = substr($archivo['path'], 0, -34);

            if (in_array('fullpath', $opciones) || in_array('todos', $opciones)) $arreglo['fullpath'] = $archivo['path'];

            array_push($tmp_retorno2, $arreglo);
        }

        return $tmp_retorno2;
    }
}
