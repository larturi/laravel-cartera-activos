<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Http\Controllers\Controller;
use App\Models\Estado;
use Illuminate\Http\Request;

use App\Services\Maestros\Estado\EstadoService;

class EstadoController extends Controller
{
    protected $estadoService;

    public function __construct(
        EstadoService $estadoService
    ) {
        $this->middleware('auth');
        $this->estadoService = $estadoService;
    }

    public function inicio()
    {
        return view('maestros/estados');
    }

    public function index()
    {
        return $this->estadoService->getAll();
    }

    public function store(Request $request)
    {
        if(Estado::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $estado = new Estado();
        $estado->nombre = $request->nombre;
        $estado->user_id = auth()->id();
        $estado->save();

        return $estado;
    }

    public function update(Request $request, $id)
    {

        if(Estado::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $estado = Estado::find($id);
        $estado->nombre = $request->nombre;
        $estado->user_id = auth()->id();
        $estado->save();

        return $estado;

    }

    public function destroy($id)
    {
        $estado = Estado::find($id);
        $estado->habilitado = false;
        $estado->user_id = auth()->id();
        $estado->save();

        return $estado;
    }
}

