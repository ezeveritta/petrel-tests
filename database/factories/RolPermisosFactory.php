<?php

namespace Database\Factories;

use App\Models\RolPermisos;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolPermisosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RolPermisos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rol_id' => 1,
            'permiso_id' => 1,
        ];
    }
}
