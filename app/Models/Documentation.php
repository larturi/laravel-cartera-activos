<?php

namespace App\Models;

// @author: Leandro Arturi (u57322)

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

class Documentation extends Model
{
    use HasFactory;
    use HasChangesHistory;
}
