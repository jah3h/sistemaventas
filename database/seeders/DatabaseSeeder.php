<?php

namespace Database\Seeders;

use App\Models\Categoria;
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
        $this->call([
            CategoriaSeeder::class,
            UnidadMedidaSeeder::class,
            ProductoSeeder::class,
            ClienteSeeder::class,
            PermisoSeeder::class,
            RolSeeder::class,
            UserSeeder::class,
        ]);
    }
}
