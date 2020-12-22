<?php

namespace App\Http\Controllers\maestros;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

use App\Services\Maestros\Role\RoleService;

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
        if(Role::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $role = new Role();
        $role->nombre = $request->nombre;
        $role->user_id = auth()->id();
        $role->save();

        return $role;
    }

    public function update(Request $request, $id)
    {

        if(Role::where('nombre', $request->nombre)->count() > 0) {
            return json_encode(['error' => 'ERROR_UNIQUE']);
        }

        $role = Role::find($id);
        $role->nombre = $request->nombre;
        $role->user_id = auth()->id();
        $role->save();

        return $role;

    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->habilitado = false;
        $role->user_id = auth()->id();
        $role->save();

        return $role;
    }

}
