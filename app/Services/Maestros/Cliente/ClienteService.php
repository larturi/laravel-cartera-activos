<?php

namespace App\Services\Maestros\Cliente;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Cliente;

class ClienteService extends BaseService
{
  public function getAll()
  {
     return Cliente::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
