<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Http\Controllers\Controller;

use App\Models\Role;
use Illuminate\Http\Request;

use App\Services\Maestros\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(
        RoleService $roleService
    ) {
        $this->middleware('auth');
        $this->roleService = $roleService;
    }

    public function inicio()
    {
        return view('maestros/roles');
    }

    public function index()
    {
        return $this->roleService->getAll();
    }

    public function store(Request $request)
    {
        return $this->roleService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->roleService->update($request, $id);
    }
}

