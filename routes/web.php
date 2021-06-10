<?php

use App\Http\Controllers\ProgramaController;
use App\Models\Usuario;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/', function () {  
  dd(
    ProgramaController::programas('', true)
  );
});

Route::get('/cargar', function() {
  $pdf = app('dompdf.wrapper');
  $pdf->loadHTML(
    "<h1>Hola mundo</h1>"
  );

  dd(
    Storage::disk('google')->append('archivo4.pdf', $pdf->output())
  );
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