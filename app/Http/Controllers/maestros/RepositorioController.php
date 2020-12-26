<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Http\Controllers\Controller;

use App\Models\Repositorio;
use Illuminate\Http\Request;

use App\Services\Maestros\RepositorioService;

class RepositorioController extends Controller
{
    protected $repositorioService;

    public function __construct(
        RepositorioService $repositorioService
    ) {
        $this->middleware('auth');
        $this->repositorioService = $repositorioService;
    }

    public function inicio()
    {
        return view('maestros/repositorios');
    }

    public function index()
    {
        return $this->repositorioService->getAll();
    }

    public function store(Request $request)
    {
        return $this->repositorioService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->repositorioService->update($request, $id);
    }
}

