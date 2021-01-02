<?php

namespace App\Services\Sistema;

// @author: Leandro Arturi (u57322)

use DB;

use App\Models\Sistema;
use App\Services\BaseService;
use Illuminate\Support\Facades\Log;

class SistemaService extends BaseService
{
  public function buscar($termino, $filtros)
  {

        $paginator_items = env("PAGINATOR_ITEMS", 20);

        // if ($termino == 'all_sistemas') {
        //     return Sistema::with('authentication')
        //                   ->with('lider')
        //                   ->with('cliente')
        //                   ->with('estado')
        //                   ->with('criticidad')
        //                   ->paginate($paginator_items);
        // } else {

            $cliente_id     = $filtros['cliente_id'] ?? 0;
            $lider_id       = $filtros['lider_id'] ?? 0;
            $recurso_id     = $filtros['recurso_id'] ?? 0;
            $estado_id      = $filtros['estado_id'] ?? 0;
            $criticidad_id  = $filtros['criticidad_id'] ?? 0;
            $lenguaje_id    = $filtros['lenguaje_id'] ?? 0;
            $base_id        = $filtros['base_id'] ?? 0;
            $login_id       = $filtros['login_id'] ?? 0;
            $impacto_id     = $filtros['impacto_id'] ?? 0;
            
            $query = Sistema::with('authentication')
                            ->with('lider')
                            ->with('cliente')
                            ->with('estado')
                            ->with('criticidad');
                            
            if ($termino != 'all_sistemas') {
                $query = $query->where('nombre', 'like', '%' . $termino . '%');
            }

            if ($cliente_id != 0) {
                $query = $query->where('cliente_id', '=', $cliente_id);
            }

            if ($lider_id != 0) {
                $query = $query->where('lider_id', '=', $lider_id);
            }

            if ($recurso_id != 0) {
                $query = $query->join('sistema_recursos as tbl4', function ($join) use($recurso_id) {
                    $join->on('tbl4.sistema_id', '=', 'sistemas.id')
                         ->where('tbl4.user_id', '=', $recurso_id);
                });
            }

            if ($estado_id != 0) {
                $query = $query->where('estado_id', '=', $estado_id);
            }

            if ($criticidad_id != 0) {
                $query = $query->where('criticidad_id', '=', $criticidad_id);
            }

            if ($lenguaje_id != 0) {
                $query = $query->join('sistema_caracteristicas as tbl1', function ($join) use($lenguaje_id) {
                    $join->on('tbl1.sistema_id', '=', 'sistemas.id')
                         ->where('tbl1.caracteristica_type', '=', 'App\Models\Lenguaje')
                         ->where('tbl1.caracteristica_id', '=', $lenguaje_id);
                });
            }

            if ($base_id != 0) {
                $query = $query->join('sistema_caracteristicas as tbl2', function ($join) use($base_id) {
                    $join->on('tbl2.sistema_id', '=', 'sistemas.id')
                         ->where('tbl2.caracteristica_type', '=', 'App\Models\Base')
                         ->where('tbl2.caracteristica_id', '=', $base_id);
                });
            }

            if ($login_id != 0) {
                $query = $query->where('authentication_id', '=', $login_id);
            }

            if ($impacto_id != 0) {
                $query = $query->join('sistema_caracteristicas as tbl3', function ($join) use($impacto_id) {
                    $join->on('tbl3.sistema_id', '=', 'sistemas.id')
                         ->where('tbl3.caracteristica_type', '=', 'App\Models\Impacto')
                         ->where('tbl3.caracteristica_id', '=', $impacto_id);
                });
            }
    
            $query = $query->select('sistemas.*');

            return $query->distinct()->paginate($paginator_items);
        }

        


  // }
}




