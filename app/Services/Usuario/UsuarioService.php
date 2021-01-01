<?php

namespace App\Services\Usuario;

// @author: Leandro Arturi (u57322)

use DB;

use App\Models\User;
use App\Services\BaseService;

class UsuarioService extends BaseService
{
  public function buscar($termino = '')
  {

    $paginator_items = env("PAGINATOR_ITEMS", 5);

    if ($termino == 'all_users') {
      return User::orderBy('apellido')->paginate($paginator_items);
    } else {
      $query = User::orderBy('apellido');
      $query = $query->where('name', 'like', '%' . $termino . '%')
                     ->orWhere('apellido', 'like', '%' . $termino . '%')
                     ->orWhere('user', 'like', '%' . $termino . '%');
      return $query->paginate($paginator_items);
    }

  }

}




