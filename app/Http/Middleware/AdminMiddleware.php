<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
         
        if($request->path() == 'order-detail') return $next($request);

        if (auth()->check() && auth()->user()->type != 'admin')
        {
            $message = 'Permiso Denegado. Solo Administradores.';
            return redirect()->route('home')->with('message', $message);
        }

        return $next($request);
    }
}
