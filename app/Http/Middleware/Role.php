<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check())  // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
        {
            return redirect('/');
        } else {
            $user = Auth::user();
            foreach($roles as $role) {
                if($user->getRole->name === $role)
                    return $next($request);
                }
            return redirect('/');
        }
    }
}
