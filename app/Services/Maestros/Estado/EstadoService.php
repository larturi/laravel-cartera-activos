<?php

namespace App\Services\Maestros\Estado;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Estado;

class EstadoService extends BaseService
{
  public function getAll()
  {
     return Estado::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
