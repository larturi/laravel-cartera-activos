<?php

namespace App\Services\Sistema;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use DB;

use App\Models\Sistema;
use App\Services\BaseService;
use Illuminate\Support\Facades\Log;

class SistemaService extends BaseService
{
  public function buscar($request = null)
  {

        $paginator_items = env("PAGINATOR_ITEMS", 20);

        if($request == null) {
            return Sistema::paginate($paginator_items);
        } else {

            $request->flash();

            $nombre = $request['nombre'];
            $lider_id = $request['lider_id'];
            $recurso_id = $request['recurso_id'];
            $estado_id = $request['estado_id'];
            $criticidad_id = $request['criticidad_id'];
            $lenguaje_id = $request['lenguaje_id'];
            $base_id = $request['base_id'];
            $login_id = $request['login_id'];
            $impacto_id = $request['impacto_id'];

            $query = Sistema::where('nombre', 'like', '%' . $nombre . '%');

            if ($lenguaje_id != '') {
                $query = $query->join('sistema_caracteristicas as tbl1', function ($join) use($lenguaje_id) {
                    $join->on('tbl1.sistema_id', '=', 'sistemas.id')
                         ->where('tbl1.caracteristica_type', '=', 'App\Models\Lenguaje')
                         ->where('tbl1.caracteristica_id', '=', $lenguaje_id);
                });
            }

            if ($base_id != '') {
                $query = $query->join('sistema_caracteristicas as tbl2', function ($join) use($base_id) {
                    $join->on('tbl2.sistema_id', '=', 'sistemas.id')
                         ->where('tbl2.caracteristica_type', '=', 'App\Models\Base')
                         ->where('tbl2.caracteristica_id', '=', $base_id);
                });
            }

            if ($impacto_id != '') {
                $query = $query->join('sistema_caracteristicas as tbl3', function ($join) use($impacto_id) {
                    $join->on('tbl3.sistema_id', '=', 'sistemas.id')
                         ->where('tbl3.caracteristica_type', '=', 'App\Models\Impacto')
                         ->where('tbl3.caracteristica_id', '=', $impacto_id);
                });
            }

            if ($lider_id != '') {
                $query = $query->where('lider_id', '=', $lider_id);
            }

            if ($estado_id != '') {
                $query = $query->where('estado_id', '=', $estado_id);
            }

            if ($criticidad_id != '') {
                $query = $query->where('criticidad_id', '=', $criticidad_id);
            }

            if ($login_id != '') {
                $query = $query->where('authentication_id', '=', $login_id);
            }

            if ($recurso_id != '') {
                $query = $query->join('sistema_recursos as tbl4', function ($join) use($recurso_id) {
                    $join->on('tbl4.sistema_id', '=', 'sistemas.id')
                         ->where('tbl4.user_id', '=', $recurso_id);
                });
            }

            $query = $query->select('sistemas.*');

            return $query->distinct()->paginate($paginator_items);

        }


  }

}




