<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __invoke(Request $request)
    {
        // $vacantes = Vacante::latest()->where('activa', true)->take(10)->get();
        // $ubicaciones = Ubicacion::all();
        // return view('inicio.index', compact('vacantes', 'ubicaciones'));

        if (auth()->user() ) {
            # code...
        } else {
            return view('auth.login');

        }

    }
}
