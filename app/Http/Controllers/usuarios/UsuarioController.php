<?php

namespace App\Http\Controllers\usuarios;

// @author: Leandro Arturi (u57322)

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Services\Usuario\UsuarioService;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Notification;
use App\Notifications\NewUserCreatedNotification;

class UsuarioController extends Controller
{
    public function __construct(
        UsuarioService $usuarioService
    ) {
        $this->usuarioService = $usuarioService;
    }

    public function index()
    {
        return view('usuarios/index');
    }

    public function solicitudes()
    {
        return view('usuarios/solicitudes');
    }

    public function getUsuarios(Request $request)
    {
        $termino = $request['termino'];

        if ($termino == '') {
            $termino = 'all_users';
        }

        return $this->usuarioService->buscar($termino);
    }

    public function update(Request $request)
    {
        $usuario = User::find($request['id_usuario']);
        $usuario->perfil = $request['id_perfil'];
        $usuario->save();

        return $usuario;
    }

    public function delete(Request $request)
    {
        $usuario = User::find($request['id_usuario']);
        $usuario->habilitado = 2;
        $usuario->save();

        return $usuario;
    }

    public function habilitar(Request $request)
    {
        $usuario = User::find($request['id_usuario']);
        $usuario->habilitado = 1;
        $usuario->save();

        return $usuario;
    }

    public function rechazar(Request $request)
    {
        $usuario = User::find($request['id_usuario']);
        $usuario->habilitado = 2;
        $usuario->save();

        return $usuario;
    }

    public function pendienteAprobacion()
    {
        // Notifico al administrador
        $administradores = User::where('perfil', '=', 'ADMIN')
        ->orWhere('perfil', '=', 'SEGURIDAD')
        ->get();

        Notification::send($administradores, new NewUserCreatedNotification(Auth::user()));

        Auth::logout();
        return redirect('/login')->with('message', 'La verificación de email fue correcta. Falta que el Administrador apruebe tu solicitud.');
    }

}
