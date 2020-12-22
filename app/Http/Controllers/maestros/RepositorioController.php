<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Http\Controllers\Controller;

use App\Models\Repositorio;
use Illuminate\Http\Request;

use App\Services\Maestros\Repositorio\RepositorioService;

class RepositorioController extends Controller
{
    protected $repositorioService;

    public function __construct(
        RepositorioService $repositorioService
    ) {
        $this->middleware('auth');
        $this->repositorioService = $repositorioService;
    }

    public function inicio()
    {
        return view('maestros/repositorios');
    }

    public function index()
    {
        return $this->repositorioService->getAll();
    }

    public function store(Request $request)
    {

        if(Repositorio::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $repositorio = new Repositorio();
        $repositorio->nombre = $request->nombre;
        $repositorio->user_id = auth()->id();
        $repositorio->save();

        return $repositorio;
    }

    public function update(Request $request, $id)
    {
        if(Repositorio::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $repositorio = Repositorio::find($id);
        $repositorio->nombre = $request->nombre;
        $repositorio->user_id = auth()->id();
        $repositorio->save();

        return $repositorio;

    }

    public function destroy($id)
    {
        $repositorio = Repositorio::find($id);
        $repositorio->habilitado = false;
        $repositorio->user_id = auth()->id();
        $repositorio->save();

        return $repositorio;
    }
}

