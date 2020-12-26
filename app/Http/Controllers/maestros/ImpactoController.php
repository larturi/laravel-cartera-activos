<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Http\Controllers\Controller;

use App\Models\Impacto;
use Illuminate\Http\Request;

use App\Services\Maestros\ImpactoService;

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
        return $this->impactoService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->impactoService->update($request, $id);
    }
}
