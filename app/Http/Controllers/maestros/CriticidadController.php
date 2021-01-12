<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Http\Controllers\Controller;

use App\Models\Cliente;
use App\Models\Criticidad;
use Illuminate\Http\Request;

use App\Services\Maestros\CriticidadService;

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
        $this->authorize(Auth()->user());
        return view('maestros/criticidad');
    }

    public function index()
    {
        return $this->criticidadService->getAll();
    }

    public function store(Request $request)
    {
        return $this->criticidadService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->criticidadService->update($request, $id);
    }
}

