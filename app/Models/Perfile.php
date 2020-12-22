<?php


namespace App\Models;

//  Perfil de Usuario
//  @author [Leandro Arturi (larturi@pami.org.ar)]

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Antonrom\ModelChangesHistory\Traits\HasChangesHistory;

class Perfile extends Model
{
    use HasFactory;
    use HasChangesHistory;
}
