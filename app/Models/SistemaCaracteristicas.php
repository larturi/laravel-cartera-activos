<?php

namespace App\Models;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

// Se reutiliza este modelo para: Lenguaje, Base, Impacto por tener los mismos atributos

class SistemaCaracteristicas extends Model
{
    use HasFactory;
    use HasChangesHistory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
