<?php

namespace App\Services\Maestros;

// @author: Leandro Arturi (u57322)

use App\Services\BaseService;
use App\Services\Maestros\MaestroGenericService;

use App\Models\Lenguaje;

class LenguajeService extends BaseService
{
  public function __construct(
    MaestroGenericService $maestroGenericService
  ) {
      $this->maestroGenericService = $maestroGenericService;
  }

  public function getAll()
  {
     return $this->maestroGenericService->getAll(Lenguaje::class);
  }

  public function store($request)
  {
      return $this->maestroGenericService->store(Lenguaje::class, $request);
  }

  public function update($request, $id)
  {
     return $this->maestroGenericService->update(Lenguaje::class, $request, $id);
  }

}
