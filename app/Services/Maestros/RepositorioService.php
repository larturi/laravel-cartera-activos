<?php

namespace App\Services\Maestros;

// @author: Leandro Arturi (u57322)

use App\Services\BaseService;
use App\Services\Maestros\MaestroGenericService;

use App\Models\Repositorio;

class RepositorioService extends BaseService
{
    public function __construct(
        MaestroGenericService $maestroGenericService
      ) {
          $this->maestroGenericService = $maestroGenericService;
      }

      public function getAll()
      {
         return $this->maestroGenericService->getAll(Repositorio::class);
      }

      public function habilitados()
      {
         return $this->maestroGenericService->habilitados(Repositorio::class);
      }

      public function store($request)
      {
          return $this->maestroGenericService->store(Repositorio::class, $request);
      }

      public function update($request, $id)
      {
         return $this->maestroGenericService->update(Repositorio::class, $request, $id);
      }

}
