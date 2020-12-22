<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Http\Controllers\Controller;

use App\Models\Impacto;
use Illuminate\Http\Request;

use App\Services\Maestros\Impacto\ImpactoService;

class ImpactoController extends Controller
{
    protected $impactoService;

    public function __construct(
        ImpactoService $impactoService
    ) {
        $this->middleware('auth');
        $this->impactoService = $impactoService;
    }

    public function inicio()
    {
        return view('maestros/impactos');
    }

    public function index()
    {
        return $this->impactoService->getAll();
    }

    public function store(Request $request)
    {
        if(Impacto::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $impacto = new Impacto();
        $impacto->nombre = $request->nombre;
        $impacto->user_id = auth()->id();
        $impacto->save();

        return $impacto;
    }

    public function update(Request $request, $id)
    {
        if(Impacto::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $impacto = Impacto::find($id);
        $impacto->nombre = $request->nombre;
        $impacto->user_id = auth()->id();
        $impacto->save();

        return $impacto;

    }

    public function destroy($id)
    {
        $impacto = Impacto::find($id);
        $impacto->habilitado = false;
        $impacto->user_id = auth()->id();
        $impacto->save();

        return $impacto;
    }
}
