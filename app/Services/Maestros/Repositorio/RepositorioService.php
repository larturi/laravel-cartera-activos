<?php

namespace App\Services\Maestros\Repositorio;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Repositorio;

class RepositorioService extends BaseService
{
  public function getAll()
  {
     return Repositorio::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
