<?php

namespace App\Http\Controllers\Auth;

// @author: Leandro Arturi (u57322)

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($user)
    {
        $user = Auth::user();

        if ($user->perfil == 'PENDIENTE') {

            Auth::logout();

            return redirect()->back()->with('message', 'Aún se encuentra pendiente la aprobación del Administrador.');
        }

        if ($user->habilitado == 2) {

            Auth::logout();

            return redirect()->back()->with('message', 'Tu usuario fue dado de baja por el Administrador.');
        }
    }


}
