<?php

namespace App\Services\Usuario;

// @author: Leandro Arturi (u57322)

use DB;

use App\Models\User;
use App\Services\BaseService;

// El sistema mira las columnas habilitado y perfil de la tabla users
// 1. El usuario solicita acceso y valida correo -> habilitado = 0, perfil = PENDIENTE
// 2. El admin acepta solicitud                  -> habilitado = 1, perfil = PENDIENTE
// 3. El admin asigna rol                        -> habilitado = 1, perfil != PENDIENTE
// 4. El admin rechaza solicitud rol             -> habilitado = 2, perfil != PENDIENTE

class UsuarioService extends BaseService
{
  public function buscar($termino = '')
  {

    $paginator_items = env("PAGINATOR_ITEMS", 5);

    if ($termino == 'all_users') {

      return User::orderBy('apellido')
                 ->where('habilitado', '=', 1)
                 ->where('perfil', '<>', 'PENDIENTE')
                 ->paginate($paginator_items);
                 
    } elseif ($termino == 'aprobacion_pendiente') {

      return User::where('perfil', '=', 'PENDIENTE')
                  ->where('habilitado', '<>', 2)
                  ->orderBy('apellido')
                  ->paginate($paginator_items);

    } else {

      $query = User::orderBy('apellido');
      $query = $query->where('name', 'like', '%' . $termino . '%')
                     ->orWhere('apellido', 'like', '%' . $termino . '%')
                     ->orWhere('user', 'like', '%' . $termino . '%');
      return $query->paginate($paginator_items);

    }

  }

}




