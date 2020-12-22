<?php

namespace App\Services\Maestros\Ambiente;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Ambiente;

class AmbienteService extends BaseService
{
  public function getAll()
  {
     return Ambiente::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
