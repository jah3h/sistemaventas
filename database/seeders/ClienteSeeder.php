<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            // CATEGORIAS
            ['nombres' => 'Juan HE', 'dni'=>'123654789',    'email'=>'jhe@test.com',    'telefono'=>'829176',    'fecha_nacimiento'=>'2000-01-01'],
            ['nombres' => 'Renato CA', 'dni'=>'111222333',    'email'=>'cesar@test.com',    'telefono'=>'264813',    'fecha_nacimiento'=>'2000-01-01'],
        ]);
    }
}
