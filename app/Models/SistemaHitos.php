<?php

namespace App\Models;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

class SistemaHitos extends Model
{
    use HasFactory;
    use HasChangesHistory;

}

