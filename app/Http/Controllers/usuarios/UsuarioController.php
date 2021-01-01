<?php

namespace App\Http\Controllers\usuarios;

// @author: Leandro Arturi (u57322)

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use App\Models\Role;
use App\Models\User;

use App\Services\Usuario\UsuarioService;

class UsuarioController extends Controller
{
    public function __construct(
        UsuarioService $usuarioService
    ) {
        $this->usuarioService = $usuarioService;
    }

    public function index()
    {
        $usuarios= $this->usuarioService->buscar();

        return view('usuarios/index');
    
    }

    public function getUsuarios(Request $request)
    {
        $termino = $request['termino'];

        Log::info($termino);

        if ($termino == '') {
            $termino = 'all_users';
        }

        return $this->usuarioService->buscar($termino);
    }

    public function update(Request $request)
    {
        $usuario = User::find($request['id_usuario']);
        $usuario->perfil = $request['id_perfil'];
        $usuario->approved = 1;
        $usuario->save();

        return $usuario;
    }

    public function delete(Request $request)
    {
        $usuario = User::find($request['id_usuario']);
        $usuario->habilitado = 0;
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

}
