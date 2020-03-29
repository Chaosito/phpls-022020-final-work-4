<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if (!$this->isAdmin()) {
            return redirect('/');
        }

        return $next($request);
    }

    public function isAdmin()
    {
        return Auth::User() && Auth::User()->is_admin;
    }
}
