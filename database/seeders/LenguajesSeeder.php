<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LenguajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('lenguajes')->insert([
            'nombre'     => 'PHP 5',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lenguajes')->insert([
            'nombre'     => 'PHP 7',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lenguajes')->insert([
            'nombre'     => 'JavaScript',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lenguajes')->insert([
            'nombre'     => 'NodeJS',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lenguajes')->insert([
            'nombre'     => 'Angular',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lenguajes')->insert([
            'nombre'     => 'Java',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lenguajes')->insert([
            'nombre'     => 'React',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lenguajes')->insert([
            'nombre'     => 'Power Builder',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lenguajes')->insert([
            'nombre'     => 'Laravel',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('lenguajes')->insert([
            'nombre'     => 'Vue',
            'user_id'    => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

    }
}
