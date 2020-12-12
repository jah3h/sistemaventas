<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidad_medidas')->insert([
            // CATEGORIAS
            ['nombre' => 'Centimetro','codigo'=>'cm'],
            ['nombre' => 'Pulgada','codigo'=>'"'],
            ['nombre' => 'Metro','codigo'=>'m'],
            ['nombre' => 'Unidad','codigo'=>'UND'],
        ]);
    }
}
