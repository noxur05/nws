<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('get')) {
            $path = $request->route()?->getName();
            $authenticationRoutes = ['registration.register', 'registration.login'];
            if (in_array($path, $authenticationRoutes)) {
                if (Auth::check()) {
                    return redirect('/');
                }
            } else {
                if (!Auth::check()) {
                    return redirect()->route('registration.login');
                }
            }
            dump($path);
        }


        return $next($request);
    }
}
