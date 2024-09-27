<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentRoute = $request->route()->getName();

        if (
            Auth::check() &&
            (
                $currentRoute === 'auth.index' ||
                $currentRoute === 'auth.store' ||
                $currentRoute === 'register.index' ||
                $currentRoute === 'register.store'
            )
        ) {
            return redirect()->route('index');
        }

        return $next($request);
    }
}
