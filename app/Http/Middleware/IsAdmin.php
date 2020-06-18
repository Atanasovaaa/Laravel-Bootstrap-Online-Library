<?php

namespace App\Http\Middleware;

use App\Author;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        // dd(Auth::user());
        if (Auth::user()->isAdmin) {
            return $next($request);
        }
        return redirect('/');
    }
}
