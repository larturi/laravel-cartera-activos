<?php

namespace App\Models;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

class Authentication extends Model
{
    use HasFactory;
    use HasChangesHistory;
}
