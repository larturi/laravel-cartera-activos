<?php

namespace App\Services\Maestros\Lenguaje;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Lenguaje;

class LenguajeService extends BaseService
{
  public function getAll()
  {
     return Lenguaje::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
