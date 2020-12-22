<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImpactosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('impactos')->insert([
            'nombre'     => 'Afiliados',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('impactos')->insert([
            'nombre'     => 'Prestadores',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('impactos')->insert([
            'nombre'     => 'Médicos de Cabecera',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('impactos')->insert([
            'nombre'     => 'Médicos Especialistas',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('impactos')->insert([
            'nombre'     => 'UGL / Agencias',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('impactos')->insert([
            'nombre'     => 'Nivel Central',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('impactos')->insert([
            'nombre'     => 'Interno (GS)',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
