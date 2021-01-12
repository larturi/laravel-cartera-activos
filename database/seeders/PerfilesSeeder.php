<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // ABM Sistemas, ABM Maestros, ABM Usuarios, Consulta Sistemas
        DB::table('perfiles')->insert([
            'nombre'     => 'ADMIN',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // ABM Sistemas Propios, Consulta Sistemas
        DB::table('perfiles')->insert([
            'nombre'     => 'CARGA',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        // Puede editar los sistemas en los que colabora, Consulta Sistemas
        DB::table('perfiles')->insert([
            'nombre'     => 'EDICION',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Consulta Sistemas
        DB::table('perfiles')->insert([
            'nombre'     => 'CONSULTA',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // ABM Usuarios, Consulta Sistemas
        DB::table('perfiles')->insert([
            'nombre'     => 'SEGURIDAD',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Consulta Sistemas y Usuarios
        DB::table('perfiles')->insert([
            'nombre'     => 'AUDITORIA',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
