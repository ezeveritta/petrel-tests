<?php

use App\Http\Controllers\PlanEstudioController;
use App\Models\PlanEstudio;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function() {
  
});

Route::get('/descargar/programa/{archivo}', function ($archivo) {
  $rawData = Storage::cloud()->get($archivo);

  return response($rawData, 200)
      ->header('ContentType','application/pdf')
      ->header('Content-Disposition', 'attachment; filename="'.$archivo.'.pdf');
});

Route::get('/archivo', function() {
  $rawData = Storage::cloud()->get('10P8wpDz5yRkRgbmR-hbBKfhhM7Tg4mot/18tgSJT16figinMvFulCaipdSER7zcZGJ/1Px9uGJlKgjcjBPNEfAxUYo-BCVXKRnle');

  dd(
    Storage::disk('local')->put('pruebaaaaaaaa.pdf', $rawData) //joya
  );
});