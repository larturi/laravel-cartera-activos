<?php

//  Rol que ocupa un recurso en el equipo de trabajo
//  @author [Leandro Arturi (larturi@pami.org.ar)]

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

class Role extends Model
{
    use HasFactory;
    use HasChangesHistory;
}
