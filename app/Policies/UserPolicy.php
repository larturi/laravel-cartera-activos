<?php

namespace App\Policies;

// @author: Leandro Arturi (u57322)

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    // Restingo el index de los paneles maestros
    public function inicio(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN';
        return true;
    }

    // Restingo el panel de usuarios
    public function index(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'SEGURIDAD';
    }

    // Restingo el panel de solicitides de usuario
    public function solicitudes(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'SEGURIDAD';
    }

    public function create(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA';
    }

    public function store(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA';
    }

    public function update(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function destroy(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA';
    }

    public function addRecursoSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function deleteRecursosSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function addCaracteristicaSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function deleteCaracteristicaSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function addLenguajeSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function deleteLenguajeSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function addBaseSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function deleteBaseSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function addImpactoSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function deleteImpactoSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function addRelacionSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function deleteRelacionSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function updateRelacion(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function deleteChecksystem(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function updateChecksystem(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function addRepositorioSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function deleteRepositorioSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function updateRepositorio(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function addDocumentationSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function deleteDocumentationSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function updateDocumentation(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function addHitoSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function deleteHitoSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function updateHito(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function addAmbienteSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function deleteAmbienteSistema(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function updateAmbiente(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }

    public function updateComentario(User $authUser, User $user)
    {
        return $authUser->perfil === 'ADMIN' || $authUser->perfil === 'CARGA' || $authUser->perfil === 'EDICION';
    }
}
