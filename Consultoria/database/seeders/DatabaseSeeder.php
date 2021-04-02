<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('abc_roles')->insert(array(
            'nombre' => 'Entidad',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        \DB::table('abc_roles')->insert(array(
            'nombre' => 'Consultor',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        \DB::table('abc_roles')->insert(array(
            'nombre' => 'Colaborador',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        \DB::table('abc_roles')->insert(array(
            'nombre' => 'Administrador',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ));
        User::create([
            'name' => 'Administrador',
            'email' => 'monjairo12@hotmail.com',
            'rol' => 4,
            'password' => Hash::make('123456789'),
        ]);
    }
}
