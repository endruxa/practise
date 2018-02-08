<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
            if(!$request->user())
            {
                return redirect('/');
            }

            if(Auth::user()->role == 2)
            {
                return $next($request);
            }

            return redirect('/');
    }
}
