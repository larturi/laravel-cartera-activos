<?php

namespace App\Http\Middleware;

// @author: Leandro Arturi (u57322)

use Closure;
use Illuminate\Http\Request;

class CheckIfIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth()->user()->perfil != 'ADMIN') {
            return redirect('home');
        }
        
        return $next($request);

    }
}
