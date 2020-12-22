<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Models\Lenguaje;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Maestros\Lenguaje\LenguajeService;

class LenguajeController extends Controller
{
    protected $lenguajeService;

    public function __construct(
        LenguajeService $lenguajeService
    ) {
        $this->middleware('auth');
        $this->lenguajeService = $lenguajeService;
    }

    public function inicio()
    {
        return view('maestros/lenguajes');
    }

    public function index()
    {
        return $this->lenguajeService->getAll();
    }

    public function store(Request $request)
    {
        if(Lenguaje::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $lenguaje = new Lenguaje();
        $lenguaje->nombre = $request->nombre;
        $lenguaje->user_id = auth()->id();
        $lenguaje->save();

        return $lenguaje;
    }

    public function update(Request $request, $id)
    {
        if(Lenguaje::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $lenguaje = Lenguaje::find($id);
        $lenguaje->nombre = $request->nombre;
        $lenguaje->user_id = auth()->id();
        $lenguaje->save();

        return $lenguaje;

    }

    public function destroy($id)
    {
        $lenguaje = Lenguaje::find($id);
        $lenguaje->habilitado = false;
        $lenguaje->user_id = auth()->id();
        $lenguaje->save();

        return $lenguaje;
    }
}

