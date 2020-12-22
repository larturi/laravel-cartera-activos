<?php

namespace App\Services\Maestros\Authentication;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Authentication;

class AuthenticationService extends BaseService
{
  public function getAll()
  {
     return Authentication::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
