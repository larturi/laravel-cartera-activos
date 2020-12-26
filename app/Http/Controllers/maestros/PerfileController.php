<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Http\Controllers\Controller;

use App\Models\Perfile;
use Illuminate\Http\Request;

use App\Services\Maestros\PerfilService;

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
        return $this->perfilService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->perfilService->update($request, $id);
    }
}
