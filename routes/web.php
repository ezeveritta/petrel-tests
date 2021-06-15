<?php

use App\Http\Controllers\PlanEstudioController;
use App\Models\PlanEstudio;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

use function PHPSTORM_META\map;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/subir_plan_a_gdrive', [PlanEstudioController::class, 'subir_planes_a_gdrive']);
Route::get('/metadata_archivos', [PlanEstudioController::class, 'metadatos_archivos']);
Route::get('/metadata_carpetas', [PlanEstudioController::class, 'metadatos_archivos']);
Route::get('/ranquel', [PlanEstudioController::class, 'urls_ranquel']);

Route::get('/cargar_planes', [PlanEstudioController::class, 'cargar_planes']);

Route::get('/rendimiento_academico', function() {
  $data = [
    "UA" => [
      "Universidad" => "",
      "Facultad" => "FAI"
    ],
    "Alumno" => [
      "Nombre" => "Natalia",
      "Apellido" => "Baeza",
      "Legajo" => "FAI-1452"
    ],
    "Documento" => [
      "Tipo" => "DNI",
      "Nro" => "40.444.444"
    ],
    "Carrera" => "LICENCIATURA EN CIENCIAS DE LA COMPUTACION",
    "Plan" => [
      "Nro" => "1112",
      "Anio" => "13",
      "ModOrd" => "0675",
      "AnioMod" => "2016"
    ],
    "Materias" => [
      [
        "Anio" => "PRIMER AÑO",
        "Materia" => "RESOLUCIÓN DE PROBLEMAS Y ALGORITMOS",
        "Fecha" => "05/03/2016",
        "Nota" => "4",
        "CondicionAprobacion" => "R"
      ], 
      [
        "Anio" => "PRIMER AÑO",
        "Materia" => "RESOLUCIÓN DE PROBLEMAS Y ALGORITMOS",
        "Fecha" => "05/03/2016",
        "Nota" => "4",
        "CondicionAprobacion" => "R"
      ], 
      [
        "Anio" => "SEGUNDO AÑO",
        "Materia" => "RESOLUCIÓN DE PROBLEMAS Y ALGORITMOS",
        "Fecha" => "05/03/2016",
        "Nota" => "4",
        "CondicionAprobacion" => "R"
      ], 
      [
        "Anio" => "TERCER AÑO",
        "Materia" => "RESOLUCIÓN DE PROBLEMAS Y ALGORITMOS",
        "Fecha" => "05/03/2016",
        "Nota" => "4",
        "CondicionAprobacion" => "R"
      ], 
    ],
    "Promedio" => "6.33",
    "FechaIngresoCarrera" => "05/02/2015",
    "Lugar" => "NEUQUEN"
  ];

  $pdf = app('dompdf.wrapper');

  $pdf->loadView('pdf_historial', ['data' => $data]);

  return $pdf->stream('archivo.pdf');
});

Route::get('/obtener_plan/{plan}', [PlanEstudioController::class, 'obtener_plan']);

Route::get('/', function() {
  $data = [
    "UA" => [
      "Universidad" => "",
      "Facultad" => "FAI"
    ],
    "Alumno" => [
      "Nombre" => "Natalia",
      "Apellido" => "Baeza",
      "Legajo" => "FAI-1452"
    ],
    "Documento" => [
      "Tipo" => "DNI",
      "Nro" => "40.444.444"
    ],
    "Carrera" => "LICENCIATURA EN CIENCIAS DE LA COMPUTACION",
    "Plan" => [
      "Nro" => "1112",
      "Anio" => "13",
      "ModOrd" => "0675",
      "AnioMod" => "2016"
    ],
    "Materias" => [
      [
        "Anio" => "PRIMER AÑO",
        "Materia" => "RESOLUCIÓN DE PROBLEMAS Y ALGORITMOS",
        "Fecha" => "05/03/2016",
        "Nota" => "4",
        "CondicionAprobacion" => "R"
      ], 
      [
        "Anio" => "PRIMER AÑO",
        "Materia" => "RESOLUCIÓN DE PROBLEMAS Y ALGORITMOS",
        "Fecha" => "05/03/2016",
        "Nota" => "4",
        "CondicionAprobacion" => "R"
      ], 
      [
        "Anio" => "SEGUNDO AÑO",
        "Materia" => "RESOLUCIÓN DE PROBLEMAS Y ALGORITMOS",
        "Fecha" => "05/03/2016",
        "Nota" => "4",
        "CondicionAprobacion" => "R"
      ], 
      [
        "Anio" => "TERCER AÑO",
        "Materia" => "RESOLUCIÓN DE PROBLEMAS Y ALGORITMOS",
        "Fecha" => "05/03/2016",
        "Nota" => "4",
        "CondicionAprobacion" => "R"
      ], 
    ],
    "Promedio" => "6.33",
    "FechaIngresoCarrera" => "05/02/2015",
    "Lugar" => "NEUQUEN"
  ];
  
  //return view('nota_dpt_alumno', ['datos' => $data]);

  $pdf = app('dompdf.wrapper');

  $pdf->loadView('nota_dpt_alumno', ['datos' => $data]);

  return $pdf->stream('archivo.pdf');
});