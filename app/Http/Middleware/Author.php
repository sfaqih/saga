<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Author
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
        if (Auth::check() && Auth::user()->role()->first()->role == 'author') {
            return $next($request);
        }

        return abort(404);        
    }
}
