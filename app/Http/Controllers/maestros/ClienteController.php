<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Http\Controllers\Controller;

use App\Models\Cliente;
use Illuminate\Http\Request;

use App\Services\Maestros\Cliente\ClienteService;

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
        return view('maestros/clientes');
    }

    public function index()
    {
        return $this->clienteService->getAll();
    }

    public function store(Request $request)
    {
        if(Cliente::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $cliente = new Cliente();
        $cliente->nombre = $request->nombre;
        $cliente->user_id = auth()->id();
        $cliente->save();

        return $cliente;
    }

    public function update(Request $request, $id)
    {
        if(Cliente::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $cliente = Cliente::find($id);
        $cliente->nombre = $request->nombre;
        $cliente->user_id = auth()->id();
        $cliente->save();

        return $cliente;

    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->habilitado = false;
        $cliente->user_id = auth()->id();
        $cliente->save();

        return $cliente;
    }
}

