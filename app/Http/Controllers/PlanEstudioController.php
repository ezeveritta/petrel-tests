<?php

namespace App\Http\Controllers;

use App\Models\PlanEstudio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlanEstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function show(PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanEstudio $planEstudio)
    {
        //
    }

    
    /**
     * Este método sube todos los pdf de los planes al gdrive en una estructura
     * similar a la usada con los programas
     */
    public static function subir_planes_a_gdrive()
    {
        # Obtener arreglo de csv
        $csv = collect(array_map('str_getcsv', file(resource_path().'/OrdenanzasRanquel.csv')))
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

    /**
     * Muestra un arreglo con las url de los planes en Ranquel
     */
    public static function urls_ranquel()
    {
        # Obtener arreglo de csv
        $csv = collect(array_map('str_getcsv', file(resource_path().'/OrdenanzasRanquel.csv')))
            ->map(fn($plan) => implode('', $plan))
            ->map(fn($plan) => explode(';', $plan));

        # Generar links de ranquel
        ddd(
            $csv->skip(1)->map(fn($plan) => 'https://ranquel.uncoma.edu.ar/archivos/'.$plan[6].'_'.$plan[3].'.pdf')
        );
    }

    /**
     * Este método carga los planes de estudio que están en el excel 'OrdenanzasRanquel.csv' a la Base de Datos
     */
    public static function cargar_planes()
    {
        # Obtener arreglo de csv
        $csv = collect(array_map('str_getcsv', file(resource_path().'/OrdenanzasRanquel.csv')))
            ->map(fn($a) => implode('', $a))
            ->map(fn($a) => explode(';', $a));

        # Generar links de ranquel
        $links_ranquel = $csv->map(fn($a) => 'https://ranquel.uncoma.edu.ar/archivos/'.$a[6].'_'.$a[3].'.pdf');
        
        // Omitir el primer resultado
        $csv->shift();
        $links_ranquel->shift();

        # cargar datos a bd
        foreach ($csv as $key => $val) { // TODO: Debería usar los mismos campos que estan definidos en el excel? yo creo que si para no perder info
            $plan = new PlanEstudio();
            $plan->anio = $val[1];
            $plan->nro_ordenanza = $val[0];
            $plan->nro_gestion = $val[3];
            $plan->gestion = $val[2];
            $plan->url = $links_ranquel[$key];

            $plan->save();
        }
    }
}
