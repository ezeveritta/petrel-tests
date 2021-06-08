<?php

use App\Models\Usuario;
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
    ddd(Usuario::all()[0]->roles[0]->permisos->pluck('descripcion'));
    return view('welcome');
});

Route::get('test', function() {
    // folder 1-Gv7j41Dl_p7uUhapI-7_DUa2sgc3l3u
    // 1dYAj0I7H4Huxz3y3keBTfgPMpjcLmYTs
    $file = Storage::disk('google')->files('', false);

    ddd(
        $file
    );
});

// NOTAS:
/*
-------------------------------------------------------------------------------------------
Storage::disk('google)->append('directorio', 'datos')

Agrega más información al FINAL del archivo.
Ejemplo: ->append('1dYAj0I7H4Huxz3y3keBTfgPMpjcLmYTs', 'holaa');
agrega la palabra 'holaa' como nueva linea del archivo '1dYAj0I7H4Huxz3y3keBTfgPMpjcLmYTs'.
-----
Storage::disk('google)->prepend('directorio', 'datos')
Agrega más información al INICIO del archivo.

-------------------------------------------------------------------------------------------
Storage::disk('google')->put('directorio', 'contenido');

Sube un archivo a google drive
Ejemplo: ->put('test.txt', 'Hello World'); // boolean

-------------------------------------------------------------------------------------------
Storage::disk('google')->copy('directorio original', 'nuevo directorio');

Copia un archivo
Ejemplo: ->copy('1dYAj0I7H4Huxz3y3keBTfgPMpjcLmYTs', 'copia_test.txt'); //boolean

-------------------------------------------------------------------------------------------
Storage::disk('google')->delete('directorio');

Elimina un archivo
Ejemplo: ->delete('1iZuPzWOCNqYZ6_muX3HdzToVXS0LZruF'); // boolean

-------------------------------------------------------------------------------------------
Storage::disk('google')->exists('directorio');

Verifica si un archivo existe: BOOLEAN
Ejemplo: ->exists('1dYAj0I7H4Huxz3y3keBTfgPMpjcLmYTs'); // boolean

-------------------------------------------------------------------------------------------
Storage::disk('google')->files('directorio', 'bool repercutivo');

retorna los 'id' de todos los ARCHIVOS (acepta repercución) /no muestra carpetas
Ejemplo: ->files(); 
// array:2 [
  0 => "1-Gv7j41Dl_p7uUhapI-7_DUa2sgc3l3u/1XXVGusO67mKSnRO1mFnyiRtLDQKFGFaZ"
  1 => "1dYAj0I7H4Huxz3y3keBTfgPMpjcLmYTs"
]

-------------------------------------------------------------------------------------------
Storage::disk('google')->makeDirectory('nombre directorio');

Crea una carpeta en google drive
Ejemplo: ->makeDirectory('nuevo directorio'); // boolean

-------------------------------------------------------------------------------------------
Storage::disk('google')->size('directorio');

Devuelve el tamaño de un archivo en BYTES
Ejemplo: ->size('1dYAj0I7H4Huxz3y3keBTfgPMpjcLmYTs'); // '28' bytes

-------------------------------------------------------------------------------------------
Storage::disk('google')->allFiles('directorio');

Devuelve el todos los archivos
Ejemplo: ->allFiles(); 
// array:2 [
  0 => "1-Gv7j41Dl_p7uUhapI-7_DUa2sgc3l3u/1XXVGusO67mKSnRO1mFnyiRtLDQKFGFaZ"
  1 => "1dYAj0I7H4Huxz3y3keBTfgPMpjcLmYTs"
]
*/