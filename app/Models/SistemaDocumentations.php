<?php

namespace App\Models;

// @author: Leandro Arturi (u57322)

use App\Models\Documentation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

class SistemaDocumentations extends Model
{
    use HasFactory;
    use HasChangesHistory;

    public function documentation()
    {
        return $this->belongsTo(Documentation::class);
    }

}

