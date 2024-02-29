<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;




class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user=auth()->user();
       // dd($roles);
        if ($user && $user->hasAnyRole($roles)) {
            return $next($request);
        }
        return back()->with('error','Accés non autorisé');
    }
}
