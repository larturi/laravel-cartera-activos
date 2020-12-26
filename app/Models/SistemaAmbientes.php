<?php

namespace App\Models;

// @author: Leandro Arturi (u57322)

use App\Models\Ambiente;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

class SistemaAmbientes extends Model
{
    use HasFactory;
    use HasChangesHistory;

    public function ambiente()
    {
        return $this->belongsTo(Ambiente::class);
    }

}

