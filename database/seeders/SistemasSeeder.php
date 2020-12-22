<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SistemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('sistemas')->insert([
            'nombre'                      => 'Cartera de Sistemas',
            'sigla'                       => 'CDS',
            'descripcion'                 => 'Sistema que permite administrar la cartera de sistemas del Instituto.',
            'cliente_id'                  => 4,
            'cliente_info'                => '',
            'lider_id'                    => 1,
            'criticidad_id'               => 2,
            'justificacion_criticidad'    => '',
            'authentication_id'           => 4,
            'f_produccion'                => '2021-02-01',
            'estado_id'                   => 1,
            'user_id'                     => 1,
            'created_at'                  => Carbon::now(),
            'updated_at'                  => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 1,
            'role_id'        => 1,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);


        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 2,
            'role_id'        => 2,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 3,
            'role_id'        => 3,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 4,
            'role_id'        => 4,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 5,
            'role_id'        => 5,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 1,
            'role_id'        => 5,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 6,
            'role_id'        => 5,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_recursos')->insert([
            'sistema_id'     => 1,
            'user_id'        => 7,
            'role_id'        => 6,
            'habilitado'     => 1,
            'user_id_log'    => 1,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 2,
            'caracteristica_type'   => 'App\Models\Base',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 3,
            'caracteristica_type'   => 'App\Models\Lenguaje',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 9,
            'caracteristica_type'   => 'App\Models\Lenguaje',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 2,
            'caracteristica_type'   => 'App\Models\Lenguaje',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 10,
            'caracteristica_type'   => 'App\Models\Lenguaje',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_caracteristicas')->insert([
            'sistema_id'            => 1,
            'caracteristica_id'     => 7,
            'caracteristica_type'   => 'App\Models\Impacto',
            'user_id'               => 1,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now(),
        ]);

        DB::table('sistema_hitos')->insert([
            'sistema'      => 1,
            'titulo'       => 'Primer Deploy',
            'fecha'        => '2021-02-01',
            'user_id'      => 1,
            'descripcion'  => 'Primer Deploy',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);

        DB::table('sistema_ambientes')->insert([
            'sistema_id'   => 1,
            'ambiente_id'  => 1,
            'url'          => 'http://carteradesistemas.dev.pami.ar',
            'user_id'      => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);

        DB::table('sistema_ambientes')->insert([
            'sistema_id'   => 1,
            'ambiente_id'  => 2,
            'url'          => 'http://carteradesistemas.qa.pami.ar',
            'user_id'      => 1,
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);



    }
}
