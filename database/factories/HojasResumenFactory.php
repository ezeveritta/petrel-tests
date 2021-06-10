<?php

namespace Database\Factories;

use App\Models\HojaResumen;
use Illuminate\Database\Eloquent\Factories\Factory;

class HojasResumenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HojaResumen::class;

    protected $table = 'hojas_resumen';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url_pdf_rendimiento_acad' => '',
            'url_pdf_plan_estudio' => '',
            'url_pdf_programas' => '',
            'url_pdf_nota_dpto_alum' => '',
            'url_pdf_hoja_unida' => ''
        ];
    }
}
