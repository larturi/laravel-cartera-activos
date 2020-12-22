<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Http\Controllers\Controller;

use App\Models\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\Maestros\Bases\BasesService;

class BaseController extends Controller
{
    protected $basesService;

    public function __construct(
        BasesService $basesService
    ) {
        $this->middleware('auth');
        $this->basesService = $basesService;
    }

    public function inicio()
    {
        return view('maestros/bases');
    }

    public function index()
    {
        return $this->basesService->getAll();
    }

    public function store(Request $request)
    {
        if(Base::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $base = new Base();
        $base->nombre = $request->nombre;
        $base->user_id = auth()->id();
        $base->save();

        return $base;
    }

    public function update(Request $request, $id)
    {
        if(Base::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $base = Base::find($id);
        $base->nombre = $request->nombre;
        $base->user_id = auth()->id();
        $base->save();

        return $base;

    }

    public function destroy($id)
    {
        $base = Base::find($id);
        $base->habilitado = false;
        $base->user_id = auth()->id();
        $base->save();

        return $base;
    }
}

