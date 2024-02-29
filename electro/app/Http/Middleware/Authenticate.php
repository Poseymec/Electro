<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null :redirect()->route('login')->with('error','Connectez-vous avant!');
    }
   /* public function handle($request, Closure $next, ...$guards)
    {
        if(Auth::check()){
            $sessionTimeoutInMinutes=config('session.lifetime');
            $lastActivity=session('last_activity');
            if(time()-$lastActivity>($sessionTimeoutInMinutes*60)){
                Auth::logout();
                session()->flush();
                return redirect()->route('login')->with('error','Votre session a expiée. Veillez vous reconnecter.');
            }
        }
        session(['last_activity'=>time()]);

        return parent::handle($request,$next, ...$guards);
    }*/
}
