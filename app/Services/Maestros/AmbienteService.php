<?php

namespace App\Services\Maestros;

// @author: Leandro Arturi (u57322)

use App\Services\BaseService;
use App\Services\Maestros\MaestroGenericService;

use App\Models\Ambiente;

class AmbienteService extends BaseService
{

  public function __construct(
    MaestroGenericService $maestroGenericService
  ) {
      $this->maestroGenericService = $maestroGenericService;
  }

  public function getAll()
  {
     return $this->maestroGenericService->getAll(Ambiente::class);
  }

  public function habilitados()
  {
     return $this->maestroGenericService->habilitados(Ambiente::class);
  }

  public function store($request)
  {
      return $this->maestroGenericService->store(Ambiente::class, $request);
  }

  public function update($request, $id)
  {
     return $this->maestroGenericService->update(Ambiente::class, $request, $id);
  }

}
