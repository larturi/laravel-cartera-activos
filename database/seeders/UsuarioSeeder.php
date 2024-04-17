<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'              => 'Leandro',
            'apellido'          => 'Arturi',
            'legajo'            => '100001',
            'user'              => 'U100001',
            'perfil'            => 'ADMIN',
            'role'              => 1,
            'es_jefe'           => true,
            'email'             => 'larturi@mail.com',
            'password'          => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Noelia',
            'apellido'          => 'Perez',
            'legajo'            => '100002',
            'user'              => 'U100002',
            'perfil'            => 'CARGA',
            'role'              => 1,
            'es_jefe'           => true,
            'email'             => 'noelia@mail.com',
            'password'          => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Ana',
            'apellido'          => 'Lopez',
            'legajo'            => '100002',
            'user'              => 'U100002',
            'perfil'            => 'EDICION',
            'role'              => 2,
            'es_jefe'           => false,
            'email'             => 'ana@mail.com',
            'password'          => Hash::make('123'),
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);
    }
}
