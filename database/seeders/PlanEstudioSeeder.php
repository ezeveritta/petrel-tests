<?php

namespace Database\Seeders;

use App\Models\PlanEstudio;
use Illuminate\Database\Seeder;

class PlanEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
