<?php

namespace App\Services;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use Carbon\Carbon;

class BaseService
{

  public function currentDatetime()
  {
    $time = Carbon::now();
    return $time->toDateTimeString();
  }

}
