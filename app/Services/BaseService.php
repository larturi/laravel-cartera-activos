<?php

namespace App\Services;

// @author: Leandro Arturi (u57322)

use Carbon\Carbon;

class BaseService
{

  public function currentDatetime()
  {
    $time = Carbon::now();
    return $time->toDateTimeString();
  }

}
