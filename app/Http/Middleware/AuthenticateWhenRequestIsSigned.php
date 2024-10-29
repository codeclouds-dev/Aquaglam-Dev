<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateWhenRequestIsSigned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $parameterName, string $guard = null)
    {
        if ($request->hasValidSignature()) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
            }
            Auth::guard($guard)->loginUsingId($request->route()->parameter($parameterName));
        }
        
        return $next($request);
    }
}
