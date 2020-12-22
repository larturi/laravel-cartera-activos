<?php

namespace App\Services\Maestros\Perfil;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Perfile;

class PerfilService extends BaseService
{
  public function getAll()
  {
     return Perfile::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
