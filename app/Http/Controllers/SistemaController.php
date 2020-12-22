<?php

namespace App\Http\Controllers;

//  @author [Leandro Arturi (larturi@pami.org.ar)]

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\SistemaPost;

use App\Models\Base;
use App\Models\Role;
use App\Models\User;
use App\Models\Estado;
use App\Models\Cliente;
use App\Models\Impacto;
use App\Models\Sistema;
use App\Models\Ambiente;
use App\Models\Lenguaje;
use App\Models\Criticidad;
use App\Models\SistemaHitos;
use App\Models\Authentication;
use App\Models\Caracteristica;
use App\Models\SistemaRecursos;
use App\Models\SistemaAmbientes;
use App\Models\SistemaRelaciones;
use App\Models\SistemaRepositorios;
use App\Models\SistemaDocumentations;
use App\Models\SistemaCaracteristicas;

use App\Services\Sistema\SistemaService;
use App\Services\Maestros\Cliente\ClienteService;
use App\Services\Maestros\Authentication\AuthenticationService;
use App\Services\Maestros\Estado\EstadoService;
use App\Services\Maestros\Criticidad\CriticidadService;
use App\Services\Maestros\Lenguaje\LenguajeService;
use App\Services\Maestros\Bases\BasesService;
use App\Services\Maestros\Impacto\ImpactoService;

class SistemaController extends Controller
{
    public function __construct(
         SistemaService $sistemaService,
         ClienteService $clienteService,
         AuthenticationService $authenticationService,
         EstadoService $estadoService,
         CriticidadService $criticidadService,
         LenguajeService $lenguajeService,
         BasesService $basesService,
         ImpactoService $impactoService
    ) {
         $this->middleware('auth');
         $this->sistemaService = $sistemaService;
         $this->clienteService = $clienteService;
         $this->authenticationService = $authenticationService;
         $this->estadoService = $estadoService;
         $this->criticidadService = $criticidadService;
         $this->lenguajeService = $lenguajeService;
         $this->basesService = $basesService;
         $this->impactoService = $impactoService;
    }

    public function index()
    {
        $sistemas = $this->sistemaService->buscar();

        $lideres         = User::where('habilitado', '=', 1)->whereIn('perfil', ['CARGA', 'ADMIN'])->orderBy('apellido', 'asc')->get();
        $recursos        = User::where('habilitado', '=', 1)->orderBy('apellido', 'asc')->get();
        $clientes        = $this->clienteService->getAll();
        $authentications = $this->authenticationService->getAll();
        $estados         = $this->estadoService->getAll();
        $criticidades    = $this->criticidadService->getAll();
        $lenguajes       = $this->lenguajeService->getAll();
        $bases           = $this->basesService->getAll();
        $impactos        = $this->impactoService->getAll();

        return view('sistema/index')
            ->with('sistemas', $sistemas)
            ->with('clientes', $clientes)
            ->with('lideres', $lideres)
            ->with('recursos', $recursos)
            ->with('estados', $estados)
            ->with('criticidades', $criticidades)
            ->with('lenguajes', $lenguajes)
            ->with('bases', $bases)
            ->with('impactos', $impactos)
            ->with('logins', $authentications);
    }

    public function buscarSistemas(Request $request) {

        $sistemas = $this->sistemaService->buscar($request);

        $lideres         = User::where('habilitado', '=', 1)->whereIn('perfil', ['CARGA', 'ADMIN'])->orderBy('apellido', 'asc')->get();
        $recursos        = User::where('habilitado', '=', 1)->orderBy('apellido', 'asc')->get();
        $clientes        = $this->clienteService->getAll();
        $authentications = $this->authenticationService->getAll();
        $estados         = $this->estadoService->getAll();
        $criticidades    = $this->criticidadService->getAll();
        $lenguajes       = $this->lenguajeService->getAll();
        $bases           = $this->basesService->getAll();
        $impactos        = $this->impactoService->getAll();

        return view('sistema/index')
            ->with('sistemas', $sistemas)
            ->with('clientes', $clientes)
            ->with('lideres', $lideres)
            ->with('recursos', $recursos)
            ->with('estados', $estados)
            ->with('criticidades', $criticidades)
            ->with('lenguajes', $lenguajes)
            ->with('bases', $bases)
            ->with('impactos', $impactos)
            ->with('logins', $authentications);
    }

    public function create()
    {

        $this->authorize(Auth()->user());

        // Consultas
        $clientes           = Cliente::all();
        $lideres            = User::where('habilitado', '=', 1)->whereIn('perfil', ['CARGA', 'ADMIN'])->orderBy('apellido', 'asc')->get();
        $authentications    = Authentication::where('habilitado', '=', 1)->orderBy('nombre', 'asc')->get();
        $estados            = Estado::where('habilitado', '=', 1)->orderBy('nombre', 'asc')->get();
        $criticidades       = Criticidad::where('habilitado', '=', 1)->orderBy('nombre', 'asc')->get();

        return view('sistema/create')
           ->with('clientes', $clientes)
           ->with('lideres', $lideres)
           ->with('estados', $estados)
           ->with('criticidades', $criticidades)
           ->with('authentications', $authentications);
    }

    public function store(SistemaPost $request)
    {
        $this->authorize(Auth()->user());

        $data = $request->validated();

        $sistema = auth()->user()->sistemas()->create([
            'nombre'                   => $data['nombre'],
            'sigla'                    => $data['sigla'],
            'descripcion'              => trim($data['descripcion']),
            'lider_id'                 => $data['lider_id'],
            'criticidad_id'            => $data['criticidad_id'],
            'justificacion_criticidad' => trim($data['justificacion_criticidad']),
            'authentication_id'        => $data['authentication_id'],
            'estado_id'                => $data['estado_id'],
            'f_produccion'             => $data['f_produccion'],
            'cliente_id'               => $data['cliente_id'],
            'cliente_info'             => $data['cliente_info'],
            'lenguajes'                => '[]',
            'bases'                    => '[]',
        ]);

        // Inserto lider en tabla recursos
        $recursoSistema = new SistemaRecursos();
        $recursoSistema->sistema_id = $sistema->id;
        $recursoSistema->user_id = $data['lider_id'];
        $recursoSistema->role_id = 1;
        $recursoSistema->habilitado = true;
        $recursoSistema->user_id_log = auth()->id();
        $recursoSistema->save();

        return redirect()->action('SistemaController@index');

    }

    public function show(Sistema $sistema)
    {
        $clientes           = Cliente::all();
        $lideres            = User::where('habilitado', '=', 1)->whereIn('perfil', ['CARGA', 'ADMIN'])->orderBy('apellido', 'asc')->get();
        $authentications    = Authentication::where('habilitado', '=', 1)->orderBy('nombre', 'asc')->get();
        $estados            = Estado::where('habilitado', '=', 1)->orderBy('nombre', 'asc')->get();
        $criticidades       = Criticidad::where('habilitado', '=', 1)->orderBy('nombre', 'asc')->get();
        $lenguajes          = Lenguaje::where('habilitado', '=', 1)->orderBy('nombre', 'asc')->get();
        $bases              = Base::where('habilitado', '=', 1)->orderBy('nombre', 'asc')->get();
        $impactos           = Impacto::where('habilitado', '=', 1)->orderBy('nombre', 'asc')->get();
        $ambientes          = Ambiente::where('habilitado', '=', 1)->orderBy('nombre', 'asc')->get();

        return view('sistema.show')
           ->with('sistema', $sistema)
           ->with('clientes', $clientes)
           ->with('lideres', $lideres)
           ->with('estados', $estados)
           ->with('criticidades', $criticidades)
           ->with('bases', $bases)
           ->with('lenguajes', $lenguajes)
           ->with('impactos', $impactos)
           ->with('ambientes', $ambientes)
           ->with('authentications', $authentications);

    }

    public function update(SistemaPost $request, Sistema $sistema)
    {
        $this->authorize(Auth()->user());

        $data = $request->validated();

        $sistema->nombre                   = $data['nombre'];
        $sistema->sigla                    = $data['sigla'];
        $sistema->descripcion              = trim($data['descripcion']);
        $sistema->lider_id                 = $data['lider_id'];
        $sistema->criticidad_id            = $data['criticidad_id'];
        $sistema->justificacion_criticidad = trim($data['justificacion_criticidad']);
        $sistema->authentication_id        = $data['authentication_id'];
        $sistema->estado_id                = $data['estado_id'];
        $sistema->f_produccion             = $data['f_produccion'];
        $sistema->cliente_id               = $data['cliente_id'];
        $sistema->cliente_info             = $data['cliente_info'];

        $sistema->save();

        // Borro el lider anterior
        SistemaRecursos::where('sistema_id', $sistema->id)
                       ->where('role_id',  1)
                       ->delete();

        // Inserto lider en tabla recursos
        $recursoSistema = new SistemaRecursos();
        $recursoSistema->sistema_id = $sistema->id;
        $recursoSistema->user_id = $data['lider_id'];
        $recursoSistema->role_id = 1;
        $recursoSistema->habilitado = true;
        $recursoSistema->user_id_log = auth()->id();
        $recursoSistema->save();

        return redirect()->action('SistemaController@update', $sistema->id)
                ->with('status', 'El sistema ha sido actualizado');
    }

    public function destroy(Sistema $sistema)
    {
        //
    }

    public function getMiembrosAll()
    {
        $miembros = User::select('id', 'name', 'apellido')
                        ->where('habilitado', true)
                        ->get();
        return $miembros;
    }

    public function getRolesAll()
    {
        $miembros = Role::select('id', 'nombre')
                        ->where('habilitado', true)
                        ->get();
        return $miembros;
    }

    public function addRecursoSistema(Request $request)
    {
        $this->authorize(Auth()->user());

        $recursoSistema = new SistemaRecursos();

        $recursoSistema->sistema_id = $request['sistema_id'];
        $recursoSistema->user_id = $request['user_id'];
        $recursoSistema->role_id = $request['role_id'];
        $recursoSistema->habilitado = true;
        $recursoSistema->user_id_log = auth()->id();

        $validate = SistemaRecursos::where('sistema_id', $request['sistema_id'])
                       ->where('user_id', $request['user_id'])
                       ->where('role_id', $request['role_id'])
                       ->get();

        if(sizeof($validate) === 1) {
            return 'UNIQUE_ERROR';
        } else {
            $recursoSistema->save();

            $recursoNew = SistemaRecursos::where('id', $recursoSistema->id)
                            ->with('user')
                            ->with('role')
                            ->get();

            return $recursoNew;
        }

    }

    public function getRecursosSistema($id)
    {
        $sistema = SistemaRecursos::where('sistema_id', $id)
                        ->with(['user', 'role'])
                        ->orderBy('role_id')
                        ->get();
        return $sistema;
    }

    public function deleteRecursosSistema($id)
    {
        $this->authorize(Auth()->user());

        $sistema = SistemaRecursos::find($id)->delete();

        return $sistema;
    }

    // Se reutiliza para lenguajes, bases, impacto
    public function addCaracteristicaSistema(Request $request, $type)
    {
        $this->authorize(Auth()->user());

        $sistema_id = $request['sistema_id'];
        $caracteristica_id  = $request['caracteristica_id'];

        $sistemaCaracteristica = new SistemaCaracteristicas();

        $sistemaCaracteristica->sistema_id = $sistema_id;
        $sistemaCaracteristica->caracteristica_id = $caracteristica_id;
        $sistemaCaracteristica->caracteristica_type = $type;
        $sistemaCaracteristica->user_id = auth()->id();

        $sistemaCaracteristica->save();

        return $sistemaCaracteristica;

    }

    public function deleteCaracteristicaSistema(Request $request, $type)
    {
        $this->authorize(Auth()->user());

        $itemBeforDelete = SistemaCaracteristicas::where('sistema_id', $request['sistema_id'])
                        ->where('caracteristica_id', $request['caracteristica_id'])
                        ->where('caracteristica_type', $type)
                        ->get();

                        SistemaCaracteristicas::where('sistema_id', $request['sistema_id'])
                        ->where('caracteristica_id', $request['caracteristica_id'])
                        ->where('caracteristica_type', $type)
                        ->delete();

        return $itemBeforDelete;

    }

    public function addLenguajeSistema(Request $request)
    {
        $this->authorize(Auth()->user());
        return $this->addCaracteristicaSistema($request, 'App\Models\Lenguaje');
    }

    public function deleteLenguajeSistema(Request $request)
    {
        $this->authorize(Auth()->user());
        return $this->deleteCaracteristicaSistema($request, 'App\Models\Lenguaje');
    }

    public function addBaseSistema(Request $request)
    {
        $this->authorize(Auth()->user());
        return $this->addCaracteristicaSistema($request, 'App\Models\Base');
    }

    public function deleteBaseSistema(Request $request)
    {
        $this->authorize(Auth()->user());
        return $this->deleteCaracteristicaSistema($request, 'App\Models\Base');
    }

    public function addImpactoSistema(Request $request)
    {
        $this->authorize(Auth()->user());
        return $this->addCaracteristicaSistema($request, 'App\Models\Impacto');
    }

    public function deleteImpactoSistema(Request $request)
    {
        $this->authorize(Auth()->user());
        return $this->deleteCaracteristicaSistema($request, 'App\Models\Impacto');
    }

    public function addRelacionSistema(Request $request)
    {
        $this->authorize(Auth()->user());

        $relacionSistema = new SistemaRelaciones();

        $relacionSistema->sistema = $request['sistema'];
        $relacionSistema->sistema_id = $request['sistema_id'];
        $relacionSistema->descripcion = $request['descripcion'];
        $relacionSistema->user_id_log = auth()->id();

        $validate = SistemaRelaciones::where('sistema', $request['sistema'])
                                     ->where('sistema_id', $request['sistema_id'])
                                     ->get();

        if(sizeof($validate) === 1) {
            return 'UNIQUE_ERROR';
        } else {
            $relacionSistema->save();

            $relacionNew = SistemaRelaciones::where('id', $relacionSistema->id)
                            ->with('sistema')
                            ->get();

            return $relacionNew;
        }

    }

    public function getRelacionesSistema($id)
    {
        $sistema = SistemaRelaciones::where('sistema', $id)
                        ->with('sistema')
                        ->get();
        return $sistema;
    }

    public function deleteRelacionSistema($id)
    {
        $this->authorize(Auth()->user());
        $sistema = SistemaRelaciones::find($id)->delete();

        return $sistema;
    }

    public function getSistemasList()
    {
        $sistemas = Sistema::all();

        return $sistemas;
    }

    public function deleteChecksystem($id)
    {
        $this->authorize(Auth()->user());

        return Sistema::where('id', $id)
          ->update(['url_checksystem' => null]);

    }

    public function updateChecksystem(Request $request)
    {
        $this->authorize(Auth()->user());

        return Sistema::where('id', $request['sistemaid'])
          ->update(['url_checksystem' => $request['url_checksystem']]);
    }

    public function addRepositorioSistema(Request $request)
    {
        $this->authorize(Auth()->user());

        $repositorioSistema = new SistemaRepositorios();

        $repositorioSistema->sistema = $request['sistema_id'];
        $repositorioSistema->repositorio_id = $request['repositorio_id'];
        $repositorioSistema->url_repositorio = $request['url_repositorio'];
        $repositorioSistema->comentarios= $request['comentarios'];
        $repositorioSistema->user_id = auth()->id();

        $repositorioSistema->save();

        $repositorioNew = SistemaRepositorios::where('id', $repositorioSistema->id)
                        ->with('repositorio')
                        ->get();

        return $repositorioNew;


    }

    public function getRepositoriosSistema($id)
    {
        $repositorios = SistemaRepositorios::where('sistema', $id)
                        ->with('repositorio')
                        ->get();
        return $repositorios;
    }

    public function deleteRepositorioSistema($id)
    {
        $this->authorize(Auth()->user());
        $repositorio = SistemaRepositorios::find($id)->delete();

        return $repositorio;
    }

    public function addDocumentationSistema(Request $request)
    {
        $this->authorize(Auth()->user());

        $documentationSistema = new SistemaDocumentations();

        $documentationSistema->sistema = $request['sistema'];
        $documentationSistema->documentation_id = $request['documentation_id'];
        $documentationSistema->url_document = $request['url_document'];
        $documentationSistema->comentarios= $request['comentarios'];
        $documentationSistema->user_id = auth()->id();

        $documentationSistema->save();

        $documentationNew = SistemaDocumentations::where('id', $documentationSistema->id)
                        ->with('documentation')
                        ->get();

        return $documentationNew;


    }

    public function getDocumentationsSistema($id)
    {
        $documentations = SistemaDocumentations::where('sistema', $id)
                        ->with('documentation')
                        ->get();
        return $documentations;
    }

    public function deleteDocumentationSistema($id)
    {
        $this->authorize(Auth()->user());

        $documentation = SistemaDocumentations::find($id)->delete();

        return $documentation;
    }

    public function addHitoSistema(Request $request)
    {
        $this->authorize(Auth()->user());

        $hitoSistema = new SistemaHitos();

        $hitoSistema->sistema = $request['sistema'];
        $hitoSistema->titulo = $request['titulo'];
        $hitoSistema->descripcion = $request['descripcion'];
        $hitoSistema->fecha= $request['fecha'];
        $hitoSistema->user_id = auth()->id();

        $hitoSistema->save();

        $hitoNew = SistemaHitos::where('id', $hitoSistema->id)->get();

        return $hitoNew;
    }

    public function getHitosSistema($id)
    {
        $hitos = SistemaHitos::where('sistema', $id)
                        ->orderBy('fecha', 'desc')
                        ->get();
        return $hitos;
    }

    public function deleteHitoSistema($id)
    {
        $this->authorize(Auth()->user());
        $hito = SistemaHitos::find($id)->delete();

        return $hito;
    }

    public function getHito($id)
    {
        $hito = SistemaHitos::where('id', $id)
                        ->get();
        return $hito;
    }

    public function updateHito(Request $request)
    {
        $this->authorize(Auth()->user());

        return SistemaHitos::where('id', $request['id'])
          ->update([
              'sistema'     => $request['sistema'],
              'titulo'      => $request['titulo'],
              'descripcion' => $request['descripcion'],
              'fecha'       => $request['fecha'],
          ]);
    }

    public function addAmbienteSistema(Request $request)
    {
        $this->authorize(Auth()->user());

        $ambienteSistema = new SistemaAmbientes();

        $ambienteSistema->sistema_id = $request['sistema_id'];
        $ambienteSistema->ambiente_id = $request['ambiente_id'];
        $ambienteSistema->url = $request['url'];
        $ambienteSistema->credenciales_bd= $request['credenciales_bd'];
        $ambienteSistema->user_id = auth()->id();

        $validate = SistemaAmbientes::where('sistema_id', $request['sistema_id'])
                       ->where('ambiente_id', $request['ambiente_id'])
                       ->get();

        if(sizeof($validate) === 1) {
            return 'UNIQUE_ERROR';
        } else {
            $ambienteSistema->save();

            $ambienteNew = SistemaAmbientes::where('id', $ambienteSistema->id)
                            ->with('ambiente')
                            ->get();

            return $ambienteNew;
        }

    }

    public function getAmbientesSistema($id)
    {
        $ambientes = SistemaAmbientes::where('sistema_id', $id)
                        ->with('ambiente')
                        ->get();
        return $ambientes;
    }

    public function deleteAmbienteSistema($id)
    {
        $this->authorize(Auth()->user());
        $ambiente = SistemaAmbientes::find($id)->delete();

        return $ambiente;
    }

    public function getAmbiente($id)
    {
        $ambiente = SistemaAmbientes::where('id', $id)
                        ->get();
        return $ambiente;
    }

    public function updateAmbiente(Request $request)
    {
        $this->authorize(Auth()->user());

        return SistemaAmbientes::where('id', $request['id'])
          ->update([
              'sistema_id'      => $request['sistema_id'],
              'ambiente_id'     => $request['ambiente_id'],
              'url'             => $request['url'],
              'credenciales_bd' => $request['credenciales_bd'],
          ]);
    }

}
