<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Http\Controllers\Controller;

use App\Models\Documentation;
use Illuminate\Http\Request;

use App\Services\Maestros\Documentacion\DocumentacionService;

class DocumentationController extends Controller
{
    protected $documentacionService;

    public function __construct(
        DocumentacionService $documentacionService
    ) {
        $this->middleware('auth');
        $this->documentacionService = $documentacionService;
    }

    public function inicio()
    {
        return view('maestros/documentations');
    }

    public function index()
    {
        return $this->documentacionService->getDocumentacion();
    }

    public function store(Request $request)
    {
        if(Documentation::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $documentation = new Documentation();
        $documentation->nombre = $request->nombre;
        $documentation->user_id = auth()->id();
        $documentation->save();

        return $documentation;
    }

    public function update(Request $request, $id)
    {
        if(Documentation::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $documentation = Documentation::find($id);
        $documentation->nombre = $request->nombre;
        $documentation->user_id = auth()->id();
        $documentation->save();

        return $documentation;

    }

    public function destroy($id)
    {
        $documentation = Documentation::find($id);
        $documentation->habilitado = false;
        $documentation->user_id = auth()->id();
        $documentation->save();

        return $documentation;
    }
}
