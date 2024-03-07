<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        // if(!Auth::check()){
            // }
            // if (! $request->user()->hasRole()) {
                // return redirect()->route('login')->withErrors(['email' => 'Please LogIn First....']);
        // }
        $user = Auth::user()->role_type;
        if ($user == $role) {
            return $next($request);
        }

        return redirect()->back();
    }
}
