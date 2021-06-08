<?php

namespace Database\Factories;

use App\Models\Rol;
use App\Models\RolUsuario;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolUsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RolUsuario::class;
    protected $table = 'rol_usuario';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rol_id' => '',
            'usuario_id' => ''
        ];
    }
}
