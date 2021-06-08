<?php

namespace Database\Factories;

use App\Models\Permiso;
use App\Models\PermisoRol;
use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;

class PermisoRolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PermisoRol::class;
    protected $table = 'permiso_rol';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rol_id' => '',
            'permiso_id' => '',
        ];
    }
}
