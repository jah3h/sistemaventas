<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            // CATEGORIAS
            ['nombre' => 'Colchón Zebra 16 5" 1 Plaza',  'precio'=>129,     'unidad_medida_id'=>4,     'categoria_id'=>1],
            ['nombre' => 'Colchón Zebra 16 5" 1.5 Plazas',  'precio'=>149,     'unidad_medida_id'=>4,     'categoria_id'=>1],
        ]);
    }
}
