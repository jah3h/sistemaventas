<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            // CATEGORIAS
           /* ['name' => 'Ver cualquier categoria',   'guard_name'=>'web'],
            ['name' => 'Crear categoria',           'guard_name'=>'web'],
            ['name' => 'Modificar categoria',       'guard_name'=>'web'],
            ['name' => 'Eliminar categoria',        'guard_name'=>'web'],*/

            // UNIDAD DE MEDIDAS
            ['name' => 'Ver cualquier unidad de medida',   'guard_name'=>'web'],
            ['name' => 'Crear unidad de medida',           'guard_name'=>'web'],
            ['name' => 'Modificar unidad de medida',       'guard_name'=>'web'],
            ['name' => 'Eliminar unidad de medida',        'guard_name'=>'web'],

            // PRODUCTOS
            ['name' => 'Ver cualquier producto',   'guard_name'=>'web'],
            ['name' => 'Crear producto',           'guard_name'=>'web'],
            ['name' => 'Modificar producto',       'guard_name'=>'web'],
            ['name' => 'Eliminar producto',        'guard_name'=>'web'],

            // CLIENTES
            ['name' => 'Ver cualquier rol',   'guard_name'=>'web'],
            ['name' => 'Crear rol',           'guard_name'=>'web'],
            ['name' => 'Modificar rol',       'guard_name'=>'web'],
            ['name' => 'Eliminar rol',        'guard_name'=>'web'],

            // USUARIOS
            ['name' => 'Ver cualquier cliente',   'guard_name'=>'web'],
            ['name' => 'Crear cliente',           'guard_name'=>'web'],
            ['name' => 'Modificar cliente',       'guard_name'=>'web'],
            ['name' => 'Eliminar cliente',        'guard_name'=>'web'],

            // ROLES
            ['name' => 'Ver cualquier venta',   'guard_name'=>'web'],
            ['name' => 'Crear venta',           'guard_name'=>'web'],
            ['name' => 'Modificar venta',       'guard_name'=>'web'],
            ['name' => 'Eliminar venta',        'guard_name'=>'web'],

            // VENTAS 
            ['name' => 'Ver cualquier usuario',   'guard_name'=>'web'],
            ['name' => 'Crear usuario',           'guard_name'=>'web'],
            ['name' => 'Modificar usuario',       'guard_name'=>'web'],
            ['name' => 'Eliminar usuario',        'guard_name'=>'web'],
        ]);
    }
}
