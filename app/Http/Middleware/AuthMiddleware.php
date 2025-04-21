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
        if (in_array($request->getPathInfo(), ['/register', '/login']) and !FacadesAuth::check()) {
            return $next($request);
        }

        if (!FacadesAuth::check()) {
            // return redirect()->route('registration.register');
        }

        return $next($request);
    }
}
