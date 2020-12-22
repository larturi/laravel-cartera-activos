<?php

namespace App\Services\Maestros\Criticidad;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Criticidad;

class CriticidadService extends BaseService
{
  public function getAll()
  {
     return Criticidad::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
