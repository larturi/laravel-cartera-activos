<?php

namespace App\Services\Maestros\Role;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Role;

class RoleService extends BaseService
{
  public function getAll()
  {
     return Role::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
