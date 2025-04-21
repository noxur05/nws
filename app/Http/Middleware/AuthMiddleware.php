<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // if (!FacadesAuth::check()) {
            // return redirect()->route('registration.login');
        // }

        if (in_array($request->getPathInfo(), ['/register', '/login']) && !FacadesAuth::check()) {
            return $next($request);
        } 
        
        return $next($request);
    }
}
