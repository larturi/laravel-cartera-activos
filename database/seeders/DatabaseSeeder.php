<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\BasesSeeder;
use Database\Seeders\EstadosSeeder;
use Database\Seeders\UsuarioSeeder;
use Database\Seeders\ClientesSeeder;
use Database\Seeders\ImpactosSeeder;
use Database\Seeders\PerfilesSeeder;
use Database\Seeders\SistemasSeeder;
use Database\Seeders\LenguajesSeeder;
use Database\Seeders\CriticidadSeeder;
use Database\Seeders\RepositoriosSeeder;
use Database\Seeders\DocumentationsSeeder;
use Database\Seeders\AuthenticationsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RepositoriosSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(LenguajesSeeder::class);
        $this->call(BasesSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(DocumentationsSeeder::class);
        $this->call(PerfilesSeeder::class);
        $this->call(AmbientesSeeder::class);
        $this->call(AuthenticationsSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(CriticidadSeeder::class);
        $this->call(ImpactosSeeder::class);
        $this->call(SistemasSeeder::class);
    }
}
