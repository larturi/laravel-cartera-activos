<?php

namespace App\Services\Usuario;

// @author: Leandro Arturi (u57322)

use DB;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Log;

class UsuarioService extends BaseService
{
  public function buscar()
  {

        $paginator_items = env("PAGINATOR_ITEMS", 20);

        return User::orderBy('apellido')->paginate($paginator_items);


  }

}




