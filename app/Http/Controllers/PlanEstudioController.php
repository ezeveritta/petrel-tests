<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;

class PlanEstudioController extends Controller
{

    /**
     * Este método sube todos los pdf de los planes al gdrive en una estructura
     * similar a la usada con los programas
     */
    public static function subir_planes_a_gdrive()
    {
        # Obtener arreglo de csv
        $csv = collect(array_map('str_getcsv', file(resource_path().'/oranquel2.csv')))
            ->map(fn($a) => implode('', $a))
            ->map(fn($a) => explode(';', $a));

        # Generar links de ranquel
        $links_ranquel = $csv->map(fn($a) => 'https://ranquel.uncoma.edu.ar/archivos/'.$a[6].'_'.$a[3].'.pdf');
        
        // Omitir el primer resultado
        $csv->shift();
        $links_ranquel->shift();

        # subir archivos a gdrive
        foreach ($csv as $key => $val) {
            $path = PlanEstudioController::crear_directorios($val);
            $nombre = $path . '/' . $val[6] . '_' . $val[3] . '.pdf';
            Storage::cloud()->put($nombre, file_get_contents($links_ranquel[$key]));
        }
    }

    /**
     * Esta función crea los directorios necesarios para subir un plan a GDrive
     * teniendo en cuenta que se guardan de la siguente forma
     * /Año/Plan/ordenanza.pdf
     * @param array $plan : datos del plan
     * @return string
     */
    protected static function crear_directorios($plan): string
    {
        # VERIFICAR SI EXISTE LA CARPETA "AÑO"
        $carpeta_año = PlanEstudioController::encontrar_directorio($plan[1]);

        # Si no se encuentra, la creamos
        if ($carpeta_año == null) {
            Storage::cloud()->makeDirectory($plan[1]);
            sleep(3);
            $carpeta_año = PlanEstudioController::encontrar_directorio($plan[1]);
        } 

        # VERIFICAR SI EXISTE LA CARPETA "PLAN"
        $carpeta_plan = PlanEstudioController::encontrar_directorio($plan[0], $carpeta_año['path']);

        # Si no se encuentra, la creamos
        if ($carpeta_plan == null) {
            Storage::cloud()->makeDirectory($carpeta_año['path'].'/'.$plan[0]);
            sleep(3);
            $carpeta_plan = PlanEstudioController::encontrar_directorio($plan[0], $carpeta_año['path']);
        }

        # RETORNAR DIRECTORIO NUEVO
        return $carpeta_plan['path'];
    }

    /**
     * Esta función busca una carpeta en GDrive dentro de un directorio
     * @param string $nombre: nombre de la carpeta a buscar
     * @param string $path: directorio donde buscar
     * @return array|null
     */
    protected static function encontrar_directorio(string $nombre, string $path = ''): array|null
    {
        # Obtener colección de carpetas dentro del directorio
        $colCarpetas = collect(Storage::cloud()->allDirectories($path))
                                ->map(fn($f) => Storage::cloud()->getMetadata($f));

        # Verificar si existe la carpeta
        $encontrada = null;
        foreach ($colCarpetas as $carpeta) {
            if ($carpeta['name'] == $nombre) $encontrada = $carpeta;
        }

        return $encontrada;
    }

    /**
     * Muestra los metadatos de todos los archivos en GDrive
     */
    public static function metadatos_archivos()
    {
        dd(
            collect(Storage::cloud()->allFiles())->map(fn($f) => Storage::cloud()->getMetadata($f))
        );
    }

    /**
     * Muestra los metadatos de todos los archivos en GDrive
     */
    public static function metadatos_carpetas()
    {
        dd(
            collect(Storage::cloud()->allDirectories())->map(fn($f) => Storage::cloud()->getMetadata($f))
        );
    }

    public static function urls_ranquel()
    {
        # Obtener arreglo de csv
        $csv = collect(array_map('str_getcsv', file(resource_path().'/oranquel2.csv')))
            ->map(fn($a) => implode('', $a))
            ->map(fn($a) => explode(';', $a));

        # Generar links de ranquel
        dd(
            $csv->map(fn($a) => 'https://ranquel.uncoma.edu.ar/archivos/'.$a[6].'_'.$a[3].'.pdf')
        );
    }
}
