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
            'name'              => 'Natalia',
            'apellido'          => 'Ruggero',
            'legajo'            => '62036',
            'user'              => 'U62036',
            'perfil'            => 'CARGA',
            'role'              => 6,
            'es_jefe'           => false,
            'email'             => 'nruggero@pami.org.ar',
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

        DB::table('users')->insert([
            'name'              => 'Abramowitz',
            'apellido'          => 'Fernando',
            'legajo'            => '66287',
            'user'              => 'U66287',
            'perfil'            => 'AUDITORIA',
            'role'              => 9,
            'es_jefe'           => false,
            'email'             => 'fabramowitz@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Pablo',
            'apellido'          => 'Cutufia',
            'legajo'            => '57581',
            'user'              => 'U57581',
            'perfil'            => 'CARGA',
            'role'              => 2,
            'es_jefe'           => false,
            'email'             => 'pcutufia@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Martin',
            'apellido'          => 'Piñeyro',
            'legajo'            => '61082',
            'user'              => 'U61082',
            'perfil'            => 'CARGA',
            'role'              => 2,
            'es_jefe'           => false,
            'email'             => 'mpiñeyro@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Maximiliano',
            'apellido'          => 'Gonzalez Mansuetti',
            'legajo'            => '61751',
            'user'              => 'U61751',
            'perfil'            => 'CARGA',
            'role'              => 2,
            'es_jefe'           => false,
            'email'             => 'mgonzalezmansuetti@pami.org.ar ',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Mariana',
            'apellido'          => 'Iriarte',
            'legajo'            => '57320',
            'user'              => 'U57320',
            'perfil'            => 'CARGA',
            'role'              => 2,
            'es_jefe'           => false,
            'email'             => 'miriarte@pami.org.ar ',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Christian',
            'apellido'          => 'Vazquez',
            'legajo'            => '52738',
            'user'              => 'U52738',
            'perfil'            => 'CARGA',
            'role'              => 3,
            'es_jefe'           => false,
            'email'             => 'cvazquez@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Jose',
            'apellido'          => 'Linzalata',
            'legajo'            => '48482',
            'user'              => 'U48482',
            'perfil'            => 'CARGA',
            'role'              => 3,
            'es_jefe'           => false,
            'email'             => 'jlinzalata@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Melisa',
            'apellido'          => 'Elfenbaum',
            'legajo'            => '57665',
            'user'              => 'U57665',
            'perfil'            => 'CARGA',
            'role'              => 3,
            'es_jefe'           => false,
            'email'             => 'melfenbaum@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name'              => 'Rodrigo',
            'apellido'          => 'Kreiner',
            'legajo'            => '62776',
            'user'              => 'U62776',
            'perfil'            => 'CARGA',
            'role'              => 3,
            'es_jefe'           => false,
            'email'             => 'rkreiner@pami.org.ar',
            'password'          => Hash::make('123'),
            'approved'          => true,
            'email_verified_at' => Carbon::now(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

    }
}
