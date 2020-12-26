<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Http\Controllers\Controller;

use App\Models\Authentication;
use Illuminate\Http\Request;

use App\Services\Maestros\AuthenticationService;

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
        return $this->authenticationService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->authenticationService->update($request, $id);
    }

}

