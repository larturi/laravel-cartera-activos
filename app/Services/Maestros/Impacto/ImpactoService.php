<?php

namespace App\Services\Maestros\Impacto;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Impacto;

class ImpactoService extends BaseService
{
  public function getAll()
  {
     return Impacto::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
