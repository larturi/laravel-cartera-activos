<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Http\Controllers\Controller;

use App\Models\Cliente;
use Illuminate\Http\Request;

use App\Services\Maestros\ClienteService;

class ClienteController extends Controller
{
    protected $clienteService;

    public function __construct(
        ClienteService $clienteService
    ) {
        $this->middleware('auth');
        $this->clienteService = $clienteService;
    }

    public function inicio()
    {
        $this->authorize(Auth()->user());
        return view('maestros/clientes');
    }

    public function index()
    {
        return $this->clienteService->getAll();
    }

    public function store(Request $request)
    {
        return $this->clienteService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->clienteService->update($request, $id);
    }
}

