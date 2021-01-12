<?php

use App\Exports\SistemasExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function() {

    // CRUD Maestros
    Route::get('/ambientes', 'maestros\AmbienteController@inicio')->name('ambientes.inicio');
    Route::get('api/ambientes/habilitados', 'maestros\AmbienteController@habilitados')->name('ambientes.habilitados');
    Route::apiResource('api/ambientes', 'maestros\AmbienteController');

    Route::get('/lenguajes', 'maestros\LenguajeController@inicio')->name('lenguajes.inicio');
    Route::apiResource('api/lenguajes', 'maestros\LenguajeController');

    Route::get('/clientes', 'maestros\ClienteController@inicio')->name('clientes.inicio');
    Route::get('api/clientes/habilitados', 'maestros\ClienteController@habilitados')->name('clientes.habilitados');
    Route::apiResource('api/clientes', 'maestros\ClienteController');

    Route::get('/bases', 'maestros\BaseController@inicio')->name('bases.inicio');
    Route::apiResource('api/bases', 'maestros\BaseController');

    Route::get('/roles', 'maestros\RoleController@inicio')->name('roles.inicio');
    Route::apiResource('api/roles', 'maestros\RoleController');

    Route::get('/perfiles', 'maestros\PerfileController@inicio')->name('perfiles.inicio');
    Route::apiResource('api/perfiles', 'maestros\PerfileController');

    Route::get('/authentications', 'maestros\AuthenticationController@inicio')->name('authentications.inicio');
    Route::get('api/authentications/habilitados', 'maestros\AuthenticationController@habilitados')->name('authentications.habilitados');
    Route::apiResource('api/authentications', 'maestros\AuthenticationController');

    Route::get('/estados', 'maestros\EstadoController@inicio')->name('estados.inicio');
    Route::apiResource('api/estados', 'maestros\EstadoController');

    Route::get('/criticidad', 'maestros\CriticidadController@inicio')->name('criticidad.inicio');
    Route::apiResource('api/criticidad', 'maestros\CriticidadController');

    Route::get('/repositorios', 'maestros\RepositorioController@inicio')->name('repositorios.inicio');
    Route::get('api/repositorios/habilitados', 'maestros\RepositorioController@habilitados')->name('repositorios.habilitados');
    Route::apiResource('api/repositorios', 'maestros\RepositorioController');

    Route::get('/documentations', 'maestros\DocumentationController@inicio')->name('documentations.inicio');
    Route::get('api/documentations/habilitados', 'maestros\DocumentationController@habilitados')->name('documentations.habilitados');
    Route::apiResource('api/documentations', 'maestros\DocumentationController');

    Route::get('/impactos', 'maestros\ImpactoController@inicio')->name('impactos.inicio');
    Route::apiResource('api/impactos', 'maestros\ImpactoController');

    // Sistemas
    Route::post('/sistemas/buscar', 'SistemaController@buscarSistemas')->name('sistemas.buscar');
    Route::get('/sistemas', 'SistemaController@index')->name('sistemas.index');
    Route::get('/sistemas/create', 'SistemaController@create')->name('sistemas.create');
    Route::get('/sistemas/{sistema}', 'SistemaController@show')->name('sistemas.show');
    Route::get('/sistemas/{sistema}/edit', 'SistemaController@edit')->name('sistemas.edit');
    Route::post('/sistemas', 'SistemaController@store')->name('sistemas.store');
    Route::delete('/sistemas/{sistema}', 'SistemaController@destroy')->name('sistemas.destroy');
    Route::put('/sistemas/{sistema}', 'SistemaController@update')->name('sistemas.update');
    Route::get('/api/sistemas/{termino}', 'SistemaController@getSistemas')->name('sistemas.get');
    Route::get('/api/sistemas', 'SistemaController@getSistemasList')->name('sistemas.list');
    Route::put('/api/sistemas', 'SistemaController@updateComentario')->name('sistemas.update-comentario');

    // Miembros (Users)
    Route::get('/api/miembros', 'SistemaController@getMiembrosAll')->name('miembros');

    // Recursos
    Route::get('/api/recursos/{sistema}', 'SistemaController@getRecursosSistema')->name('recursos.get');
    Route::post('/api/recursos', 'SistemaController@addRecursoSistema')->name('recursos.add');
    Route::delete('/api/recursos/{recurso}', 'SistemaController@deleteRecursosSistema')->name('recursos.delete');
    Route::get('/api/lideres', 'SistemaController@getLideres')->name('lideres.get');

    // Lenguajes
    Route::post('/api/lenguajes-sistema/add', 'SistemaController@addLenguajeSistema')->name('lenguajes-sistema.add');
    Route::post('/api/lenguajes-sistema/delete', 'SistemaController@deleteLenguajeSistema')->name('lenguajes-sistema.delete');

    // Bases
    Route::post('/api/bases-sistema/add', 'SistemaController@addBaseSistema')->name('bases-sistema.add');
    Route::post('/api/bases-sistema/delete', 'SistemaController@deleteBaseSistema')->name('bases-sistema.delete');

    // Relaciones con otros Sistemas
    Route::get('/api/relaciones/{sistema}', 'SistemaController@getRelacionesSistema')->name('relaciones.get');
    Route::post('/api/relaciones', 'SistemaController@addRelacionSistema')->name('relaciones.add');
    Route::delete('/api/relaciones/{relacion}', 'SistemaController@deleteRelacionSistema')->name('relaciones.delete');
    Route::get('/api/relacion-sistema/{relacion}', 'SistemaController@getRelacion')->name('relacion.get');
    Route::put('/api/relacion-sistema', 'SistemaController@updateRelacion')->name('relacion.update');

    // Checksystem
    Route::delete('/api/checksystem/{sistema}', 'SistemaController@deleteChecksystem')->name('checksystem.delete');
    Route::put('/api/checksystem', 'SistemaController@updateChecksystem')->name('checksystem.update');

    // Repositorios
    Route::get('/api/repositorios-sistema/{sistema}', 'SistemaController@getRepositoriosSistema')->name('repositorios.get');
    Route::post('/api/repositorios-sistema', 'SistemaController@addRepositorioSistema')->name('repositorios.add');
    Route::delete('/api/repositorios-sistema/{repositorio}', 'SistemaController@deleteRepositorioSistema')->name('repositorios.delete');
    Route::get('/api/repositorio-sistema/{repositorio}', 'SistemaController@getRepositorio')->name('repositorio.get');
    Route::put('/api/repositorio-sistema', 'SistemaController@updateRepositorio')->name('repositorio.update');

    // Documentations
    Route::get('/api/documentations-sistema/{sistema}', 'SistemaController@getDocumentationsSistema')->name('documentations.get');
    Route::post('/api/documentations-sistema', 'SistemaController@addDocumentationSistema')->name('documentations.add');
    Route::delete('/api/documentations-sistema/{documentation}', 'SistemaController@deleteDocumentationSistema')->name('documentations.delete');
    Route::get('/api/documentation-sistema/{repositorio}', 'SistemaController@getDocumentation')->name('documentation.get');
    Route::put('/api/documentation-sistema', 'SistemaController@updateDocumentation')->name('documentation.update');

    // Hitos
    Route::get('/api/hitos-sistema/{sistema}', 'SistemaController@getHitosSistema')->name('hitos.get');
    Route::post('/api/hitos-sistema', 'SistemaController@addhitoSistema')->name('hito.add');
    Route::delete('/api/hitos-sistema/{hito}', 'SistemaController@deleteHitoSistema')->name('hito.delete');
    Route::get('/api/hito-sistema/{hito}', 'SistemaController@getHito')->name('hito.get');
    Route::put('/api/hito-sistema', 'SistemaController@updateHito')->name('hito.update');

    // Impacto
    Route::post('/api/impactos-sistema/add', 'SistemaController@addImpactoSistema')->name('impactos-sistema.add');
    Route::post('/api/impactos-sistema/delete', 'SistemaController@deleteImpactoSistema')->name('impactos-sistema.delete');

    // Ambientes
    Route::get('/api/ambientes-sistema/{sistema}', 'SistemaController@getAmbientesSistema')->name('ambientes.get');
    Route::post('/api/ambientes-sistema', 'SistemaController@addAmbienteSistema')->name('ambientes.add');
    Route::delete('/api/ambientes-sistema/{ambiente}', 'SistemaController@deleteAmbienteSistema')->name('ambientes.delete');
    Route::get('/api/ambiente-sistema/{ambiente}', 'SistemaController@getAmbiente')->name('ambiente.get');
    Route::put('/api/ambiente-sistema', 'SistemaController@updateAmbiente')->name('ambiente.update');

    // Usuarios
    Route::post('/usuarios/buscar', 'usuarios\UsuarioController@buscar')->name('usuarios.buscar');
    Route::get('/usuarios', 'usuarios\UsuarioController@index')->name('usuarios.index');
    Route::get('/solicitudes', 'usuarios\UsuarioController@solicitudes')->name('usuarios.solicitudes');
    Route::get('/usuarios/{usuario}', 'usuarios\UsuarioController@show')->name('usuarios.show');
    Route::put('/usuarios/{usuario}', 'usuarios\UsuarioController@update')->name('usuarios.update');
    Route::post('/usuarios/update/baja', 'usuarios\UsuarioController@delete')->name('usuarios.delete');
    Route::post('/usuarios/update/habilitar', 'usuarios\UsuarioController@habilitar')->name('usuarios.habilitar');
    Route::post('/usuarios/update/rechazar', 'usuarios\UsuarioController@rechazar')->name('usuarios.rechazar');
    Route::get('/api/usuarios/{termino}', 'usuarios\UsuarioController@getUsuarios')->name('usuarios.get');

    // Seguridad
    Route::get('/pendiente-aprobacion', 'usuarios\UsuarioController@pendienteAprobacion')->name('pendiente.aprobacion');

    // Exports Excel
    Route::get('/exports/sistemas', function() {
        return (new SistemasExport)->download('sistemas.xlsx');
    });

});

// Página de Inicio
Route::get('/', function () {
    return redirect('sistemas');
});

Route::get('/home', function () {
    return redirect('sistemas');
});


