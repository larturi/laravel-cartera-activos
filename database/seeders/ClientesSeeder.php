<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('clientes')->insert([
            'nombre'     => 'Gerencia de Medicamentos',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('clientes')->insert([
            'nombre'     => 'Gerencia de Prestaciones Médicas',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('clientes')->insert([
            'nombre'     => 'Gerencia de Recursos Humanos',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('clientes')->insert([
            'nombre'     => 'Gerencia de Sistemas',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('clientes')->insert([
            'nombre'     => 'Secretaria General Tecnico Operativa',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('clientes')->insert([
            'nombre'     => 'Gerencia Economico Financiero',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('clientes')->insert([
            'nombre'     => 'Gerencia de Análisis Procesos Retributivos',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('clientes')->insert([
            'nombre'     => 'Gerencia de Asuntos Jurídicos',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('clientes')->insert([
            'nombre'     => 'Dirección Ejecutiva',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
