<?php

namespace App\Services\Maestros;

// @author: Leandro Arturi (u57322)

use App\Services\BaseService;
use App\Services\Maestros\MaestroGenericService;

use App\Models\Authentication;

class AuthenticationService extends BaseService
{
  public function __construct(
    MaestroGenericService $maestroGenericService
  ) {
      $this->maestroGenericService = $maestroGenericService;
  }

  public function getAll()
  {
     return $this->maestroGenericService->getAll(Authentication::class);
  }

  public function habilitados()
  {
     return $this->maestroGenericService->habilitados(Ambiente::class);
  }

  public function store($request)
  {
      return $this->maestroGenericService->store(Authentication::class, $request);
  }

  public function update($request, $id)
  {
     return $this->maestroGenericService->update(Authentication::class, $request, $id);
  }

}
