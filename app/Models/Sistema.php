<?php

namespace App\Models;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use DB;
use Log;

use App\Models\Estado;
use App\Models\Cliente;
use App\Models\Criticidad;
use App\Models\SistemaBases;
use App\Models\Authentication;
use App\Models\SistemaImpactos;
use App\Models\SistemaRecursos;
use App\Models\SistemaLenguajes;
use App\Models\SistemaRelaciones;
use App\Models\SistemaRepositorios;
use App\Models\SistemaCaracteristicas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

class Sistema extends Model
{
    use HasFactory;
    use HasChangesHistory;

    protected $fillable = [
       'nombre',
       'sigla',
       'criticidad_id',
       'justificacion_criticidad',
       'authentication_id',
       'descripcion',
       'cliente_id',
       'estado_id',
       'cliente_info',
       'lider_id',
       'f_produccion',
       'url_checksystem',
       'f_baja'
    ];

    // Relacion 1:1 Sistema:Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relacion 1:1 Sistema:Lider
    public function lider()
    {
        return $this->belongsTo(User::class);
    }

    // Relacion 1:1 Sistema:Criticidad
    public function criticidad()
    {
        return $this->belongsTo(Criticidad::class);
    }

    // Relacion 1:1 Sistema:Authentication
    public function authentication()
    {
        return $this->belongsTo(Authentication::class);
    }

    // Relacion 1:1 Sistema:Estado
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    // Relacion 1:n Sistema:Recursos
    public function recursos()
    {
        return $this->hasMany(SistemaRecursos::class);
    }

    // Relacion 1:n Sistema:Caracteristicas (Lenguaje, Base, Impacto)
    public function caracteristicas()
    {
        return $this->hasMany(SistemaCaracteristicas::class);
    }

    // Relacion 1:n Sistema:Lenguajes
    public function lenguajes()
    {
        return $this->caracteristicas()->where('caracteristica_type', '=', 'App\Models\Lenguaje');
    }

    // Relacion 1:n Sistema:Bases
    public function bases()
    {
        return $this->caracteristicas()->where('caracteristica_type', '=', 'App\Models\Base');
    }

    // Relacion 1:n Sistema:Impactos
    public function impactos()
    {
        return $this->caracteristicas()->where('caracteristica_type', '=', 'App\Models\Impacto');
    }

    // Relacion 1:n Sistema:Relaciones
    public function relaciones()
    {
        return $this->caracteristicas()->where('caracteristica_type', '=', 'App\Models\Relacion');
    }

    // Relacion 1:n Sistema:Repositorios
    public function repositorios()
    {
        return $this->hasMany(SistemaRepositorios::class);
    }

}
