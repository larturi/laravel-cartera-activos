<?php

namespace App\Services\Maestros;

// @author: Leandro Arturi (u57322)

use App\Services\BaseService;

class MaestroGenericService extends BaseService
{
  public function getAll($model)
  {
     return $model::orderBy('habilitado', 'desc')->orderBy('nombre', 'asc')->get();
  }

  public function update($model, $request, $id)
  {
    if (!isset($request->habilitado)) {
        if($model::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }
        $habilitado = true;
    } else {
        $habilitado = $request->habilitado;
    }

    $maestro = $model::find($id);
    $maestro->nombre = $request->nombre;
    $maestro->habilitado = $habilitado;
    $maestro->user_id = auth()->id();
    $maestro->save();

    return $maestro;
  }

  public function store($model, $request)
    {
        if($model::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $maestro = new $model();
        $maestro->nombre = $request->nombre;
        $maestro->user_id = auth()->id();
        $maestro->habilitado = true;
        $maestro->save();

        return $maestro;
    }

}
