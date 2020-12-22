<?php

namespace App\Services\Maestros\Bases;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Base;

class BasesService extends BaseService
{
  public function getAll()
  {
     return Base::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
