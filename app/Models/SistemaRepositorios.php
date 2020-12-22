<?php

namespace App\Models;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

class SistemaRepositorios extends Model
{
    use HasFactory;
    use HasChangesHistory;

    public function repositorio()
    {
        return $this->belongsTo(Repositorio::class);
    }

}

