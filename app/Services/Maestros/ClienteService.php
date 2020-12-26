<?php

namespace App\Services\Maestros;

// @author: Leandro Arturi (u57322)

use App\Services\BaseService;
use App\Services\Maestros\MaestroGenericService;

use App\Models\Cliente;

class ClienteService extends BaseService
{
  public function __construct(
    MaestroGenericService $maestroGenericService
  ) {
      $this->maestroGenericService = $maestroGenericService;
  }

  public function getAll()
  {
     return $this->maestroGenericService->getAll(Cliente::class);
  }

  public function store($request)
  {
      return $this->maestroGenericService->store(Cliente::class, $request);
  }

  public function update($request, $id)
  {
     return $this->maestroGenericService->update(Cliente::class, $request, $id);
  }

}
