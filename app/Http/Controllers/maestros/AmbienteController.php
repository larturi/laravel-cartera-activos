<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Http\Controllers\Controller;

use App\Models\Ambiente;
use Illuminate\Http\Request;

use App\Services\Maestros\Ambiente\AmbienteService;

class AmbienteController extends Controller
{

    protected $ambienteService;

    public function __construct(
        AmbienteService $ambienteService
    ) {
        $this->middleware('auth');
        $this->ambienteService = $ambienteService;
    }

    public function inicio()
    {
        return view('maestros/ambientes');
    }

    public function index()
    {
        return $this->ambienteService->getAll();
    }

    public function store(Request $request)
    {
        if(Ambiente::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $ambiente = new Ambiente();
        $ambiente->nombre = $request->nombre;
        $ambiente->user_id = auth()->id();
        $ambiente->save();

        return $ambiente;
    }

    public function update(Request $request, $id)
    {
        if(Ambiente::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $ambiente = Ambiente::find($id);
        $ambiente->nombre = $request->nombre;
        $ambiente->user_id = auth()->id();
        $ambiente->save();

        return $ambiente;

    }

    public function destroy($id)
    {
        $ambiente = Ambiente::find($id);
        $ambiente->habilitado = false;
        $ambiente->user_id = auth()->id();
        $ambiente->save();

        return $ambiente;
    }
}

