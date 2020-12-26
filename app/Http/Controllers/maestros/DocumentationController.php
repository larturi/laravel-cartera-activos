<?php

namespace App\Http\Controllers\maestros;

// @author: Leandro Arturi (u57322)

use App\Http\Controllers\Controller;

use App\Models\Documentation;
use Illuminate\Http\Request;

use App\Services\Maestros\DocumentacionService;

class DocumentationController extends Controller
{
    protected $documentacionService;

    public function __construct(
        DocumentacionService $documentacionService
    ) {
        $this->middleware('auth');
        $this->documentacionService = $documentacionService;
    }

    public function inicio()
    {
        return view('maestros/documentations');
    }

    public function index()
    {
        return $this->documentacionService->getAll();
    }

    public function store(Request $request)
    {
        return $this->documentacionService->store($request);
    }

    public function update(Request $request, $id)
    {
        return $this->documentacionService->update($request, $id);
    }
}
