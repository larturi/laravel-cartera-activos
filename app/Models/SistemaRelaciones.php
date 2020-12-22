<?php

namespace App\Models;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Models\User;
use App\Models\Sistema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

class SistemaRelaciones extends Model
{
    use HasFactory;
    use HasChangesHistory;

    public function sistema()
    {
        return $this->belongsTo(Sistema::class);
    }


}
