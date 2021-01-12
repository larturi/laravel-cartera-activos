<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Http\Controllers\Controller;

use App\Models\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Services\Maestros\BasesService;

class BaseController extends Controller
{
    protected $basesService;

    public function __construct(
        BasesService $basesService
    ) {
        $this->middleware('auth');
        $this->basesService = $basesService;
    }

    public function inicio()
    {
        $this->authorize(Auth()->user());
        return view('maestros/bases');
    }

    public function index()
    {
        return $this->basesService->getAll();
    }

    public function store(Request $request)
    {
        return $this->basesService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->basesService->update($request, $id);
    }
}

