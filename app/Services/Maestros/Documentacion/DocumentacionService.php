<?php

namespace App\Services\Maestros\Documentacion;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Services\BaseService;

use App\Models\Documentation;

class DocumentacionService extends BaseService
{
  public function getDocumentacion()
  {
     return Documentation::where('habilitado', true)->orderBy('nombre', 'asc')->get();
  }

}
