<?php

namespace App\Models;

// @author: Leandro Arturi (u57322)

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

class SistemaHitos extends Model
{
    use HasFactory;
    use HasChangesHistory;

}

