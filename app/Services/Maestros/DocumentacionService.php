<?php

namespace App\Services\Maestros;

// @author: Leandro Arturi (u57322)

use App\Services\BaseService;
use App\Services\Maestros\MaestroGenericService;

use App\Models\Documentation;

class DocumentacionService extends BaseService
{
  public function __construct(
    MaestroGenericService $maestroGenericService
  ) {
      $this->maestroGenericService = $maestroGenericService;
  }

  public function getAll()
  {
     return $this->maestroGenericService->getAll(Documentation::class);
  }

  public function habilitados()
  {
     return $this->maestroGenericService->habilitados(Documentation::class);
  }

  public function store($request)
  {
      return $this->maestroGenericService->store(Documentation::class, $request);
  }

  public function update($request, $id)
  {
     return $this->maestroGenericService->update(Documentation::class, $request, $id);
  }

}
