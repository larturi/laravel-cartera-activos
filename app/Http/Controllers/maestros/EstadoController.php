<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Http\Controllers\Controller;
use App\Models\Estado;
use Illuminate\Http\Request;

use App\Services\Maestros\EstadoService;

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
        return $this->estadoService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->estadoService->update($request, $id);
    }
}

