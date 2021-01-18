<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Models\Ambiente;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Controller;
use App\Services\Maestros\AmbienteService;

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

    public function habilitados()
    {
        return $this->ambienteService->habilitados();
    }

    public function store(Request $request)
    {
        return $this->ambienteService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->ambienteService->update($request, $id);
    }

}

