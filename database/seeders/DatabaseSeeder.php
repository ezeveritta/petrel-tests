<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\Rol;
use App\Models\PermisoRol;
use App\Models\Usuario;
use App\Models\RolUsuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* PERMISOS */
         Permiso::factory()->create(['descripcion' => 'escribir']);
         Permiso::factory()->create(['descripcion' => 'leer']);
         Permiso::factory()->create(['descripcion' => 'modificar']);
         Permiso::factory()->create(['descripcion' => 'subir']);
         Permiso::factory()->create(['descripcion' => 'administrador']);

        /* ROLES */
         Rol::factory()->create(['descripcion' => 'estudiante']);
         Rol::factory()->create(['descripcion' => 'administrador']);
         Rol::factory()->create(['descripcion' => 'dept alumn']);

        /* Roles tiene permisos */
         PermisoRol::factory()->create(['rol_id' => 1, 'permiso_id' => 2]); // 1 estudiante = 2 leer
         PermisoRol::factory()->create(['rol_id' => 1, 'permiso_id' => 4]); // 1 estudiante = 4 subir

         PermisoRol::factory()->create(['rol_id' => 2, 'permiso_id' => 1]); // 2 administrador = 1 escribir
         PermisoRol::factory()->create(['rol_id' => 2, 'permiso_id' => 2]); // 2 administrador = 2 leer
         PermisoRol::factory()->create(['rol_id' => 2, 'permiso_id' => 5]); // 2 administrador = 5 administrador

         PermisoRol::factory()->create(['rol_id' => 3, 'permiso_id' => 2]); // 3 dept alumn = 2 leer
         PermisoRol::factory()->create(['rol_id' => 3, 'permiso_id' => 4]); // 3 dept alumn = 4 subir

        /* USUARIOS */
         Usuario::factory()->create([
            'legajo' => 'FAI-2172',
            'nombre' => 'Ezequiel',
            'apellido' => 'Vera',
            'email' => 'ezeveritta@gmail.com',
            'contrasenia' => '123'
         ]);
         Usuario::factory()->create([
            'legajo' => 'ADM-1234',
            'nombre' => 'Santiago',
            'apellido' => 'Nomacuerdo',
            'email' => 'correo@gmail.com',
            'contrasenia' => '12345'
         ]);

        /* USUARIO ROLES */
         RolUsuario::factory()->create(['usuario_id' => 1, 'rol_id' => 1]); // 1 Ezequiel = 1 estudiante
         RolUsuario::factory()->create(['usuario_id' => 2, 'rol_id' => 2]); // 2 Santiago = 2 administrador
    }
}
