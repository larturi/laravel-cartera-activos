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
            'legajo'            => '57322',
            'user'              => 'U57322',
            'perfil'            => 'ADMIN',
            'role'              => 1,
            'es_jefe'           => true,
            'email'             => 'larturi@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Noelia',
            'apellido'          => 'Massone',
            'legajo'            => '57974',
            'user'              => 'U57974',
            'perfil'            => 'CARGA',
            'role'              => 1,
            'es_jefe'           => true,
            'email'             => 'nmassone@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Ana',
            'apellido'          => 'Jara',
            'legajo'            => '63525',
            'user'              => 'U63525',
            'perfil'            => 'EDICION',
            'role'              => 2,
            'es_jefe'           => false,
            'email'             => 'ajara@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Ricardo',
            'apellido'          => 'Hoyos',
            'legajo'            => '51860',
            'user'              => 'U51860',
            'perfil'            => 'CARGA',
            'role'              => 3,
            'es_jefe'           => false,
            'email'             => 'rhoyos@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Sebastian',
            'apellido'          => 'Alvarez',
            'legajo'            => '54793',
            'user'              => 'U54793',
            'perfil'            => 'CONSULTA',
            'role'              => 4,
            'es_jefe'           => false,
            'email'             => 'salvarez@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Ezequiel',
            'apellido'          => 'Lopez Vargas',
            'legajo'            => '62632',
            'user'              => 'U62632',
            'perfil'            => 'CARGA',
            'role'              => 4,
            'es_jefe'           => false,
            'email'             => 'elopezvargas@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Gonzalo',
            'apellido'          => 'Arena',
            'legajo'            => '62641',
            'user'              => 'U62641',
            'perfil'            => 'CARGA',
            'role'              => 6,
            'es_jefe'           => false,
            'email'             => 'garena@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Ignacio',
            'apellido'          => 'Casinelli Esviza',
            'legajo'            => '66291',
            'user'              => 'U66291',
            'perfil'            => 'CARGA',
            'role'              => 3,
            'es_jefe'           => false,
            'email'             => 'icasinelliesviza@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Marcos',
            'apellido'          => 'Mansueti',
            'legajo'            => '66288',
            'user'              => 'U66288',
            'perfil'            => 'AUDITORIA',
            'role'              => 7,
            'es_jefe'           => false,
            'email'             => 'mmansueti@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

    }
}
