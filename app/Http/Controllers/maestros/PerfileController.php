<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Http\Controllers\Controller;

use App\Models\Perfile;
use Illuminate\Http\Request;

use App\Services\Maestros\Perfil\PerfilService;

class PerfileController extends Controller
{
    protected $perfilService;

    public function __construct(
        PerfilService $perfilService
    ) {
        $this->middleware('auth');
        $this->perfilService = $perfilService;
    }

    public function inicio()
    {
        return view('maestros/perfiles');
    }

    public function index()
    {
        return $this->perfilService->getAll();
    }

    public function store(Request $request)
    {
        if(Perfile::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $perfile = new Perfile();
        $perfile->nombre = $request->nombre;
        $perfile->user_id = auth()->id();
        $perfile->save();

        return $perfile;
    }

    public function update(Request $request, $id)
    {
        if(Perfile::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $perfile = Perfile::find($id);
        $perfile->nombre = $request->nombre;
        $perfile->user_id = auth()->id();
        $perfile->save();

        return $perfile;

    }

    public function destroy($id)
    {
        $perfile = Perfile::find($id);
        $perfile->habilitado = false;
        $perfile->user_id = auth()->id();
        $perfile->save();

        return $perfile;
    }
}
