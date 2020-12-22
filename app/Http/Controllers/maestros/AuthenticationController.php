<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Http\Controllers\Controller;

use App\Models\Authentication;
use Illuminate\Http\Request;

use App\Services\Maestros\Authentication\AuthenticationService;

class AuthenticationController extends Controller
{
    protected $authenticationService;

    public function __construct(
        AuthenticationService $authenticationService
    ) {
        $this->middleware('auth');
        $this->authenticationService = $authenticationService;
    }

    public function inicio()
    {
        return view('maestros/authentications');
    }

    public function index()
    {
        return $this->authenticationService->getAll();
    }

    public function store(Request $request)
    {
        if(Authentication::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $authentication = new Authentication();
        $authentication->nombre = $request->nombre;
        $authentication->user_id = auth()->id();
        $authentication->save();

        return $authentication;
    }

    public function update(Request $request, $id)
    {
        if(Authentication::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $authentication = Authentication::find($id);
        $authentication->nombre = $request->nombre;
        $authentication->user_id = auth()->id();
        $authentication->save();

        return $authentication;

    }

    public function destroy($id)
    {
        $authentication = Authentication::find($id);
        $authentication->habilitado = false;
        $authentication->user_id = auth()->id();
        $authentication->save();

        return $authentication;
    }
}

