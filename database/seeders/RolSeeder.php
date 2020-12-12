<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'Administrador']);
        $role = Role::create(['name'=>'Vendedor']);
        $role->givePermissionTo(['Ver cualquier venta','Crear venta','Ver cualquier cliente','Crear cliente','Modificar cliente']);
    }
}
