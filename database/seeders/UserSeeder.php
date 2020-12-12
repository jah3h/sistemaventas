<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin Admin',
            'email' => 'Admin@admin.com',
            'password' => Hash::make('123456789'),
        ]);
        
        $user->assignRole('Administrador');

        $user2 = User::create([
            'name' => 'Test Vendedor',
            'email' => 'Vendedor@admin.com',
            'password' => Hash::make('123456789'),
        ]);
        
        $user2->assignRole('Vendedor');

    }
}
