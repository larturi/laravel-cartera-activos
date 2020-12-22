<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Http\Controllers\Controller;

use App\Models\Cliente;
use App\Models\Criticidad;
use Illuminate\Http\Request;

use App\Services\Maestros\Criticidad\CriticidadService;

class CriticidadController extends Controller
{
    protected $criticidadService;

    public function __construct(
        CriticidadService $criticidadService
    ) {
        $this->middleware('auth');
        $this->criticidadService = $criticidadService;
    }

    public function inicio()
    {
        return view('maestros/criticidad');
    }

    public function index()
    {
        return $this->criticidadService->getAll();
    }

    public function store(Request $request)
    {
        if(Criticidad::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $criticidad = new Criticidad();
        $criticidad->nombre = $request->nombre;
        $criticidad->user_id = auth()->id();
        $criticidad->save();

        return $criticidad;
    }

    public function update(Request $request, $id)
    {

        if(Criticidad::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $criticidad = Criticidad::find($id);
        $criticidad->nombre = $request->nombre;
        $criticidad->user_id = auth()->id();
        $criticidad->save();

        return $criticidad;

    }

    public function destroy($id)
    {
        $criticidad = Criticidad::find($id);
        $criticidad->habilitado = false;
        $criticidad->user_id = auth()->id();
        $criticidad->save();

        return $criticidad;
    }
}

