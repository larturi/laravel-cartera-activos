<?php

namespace App\Models;

// @author: Leandro Arturi (u57322)

use App\Models\Sistema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Yadahan\AuthenticationLog\AuthenticationLogable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use AuthenticationLogable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'apellido',
        'legajo',
        'user',
        'perfil',
        'role',
        'es_jefe',
        'habilitado',
        'approved',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function canCreate()
    {
        $authUser = Auth::user();
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA';
    }

    public function canEdit()
    {
        $authUser = Auth::user();
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    // Relacion 1:n
    public function sistemas()
    {
        return $this->hasMany(Sistema::class);
    }
}
