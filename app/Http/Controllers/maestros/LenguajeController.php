<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Models\Lenguaje;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Maestros\LenguajeService;

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
        return $this->lenguajeService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->lenguajeService->update($request, $id);
    }
}

