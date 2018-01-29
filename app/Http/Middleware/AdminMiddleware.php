<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
            if (Auth::user()->role == 2)
            {
                return $next($request);
            }
                return redirect(route('admin.index'));
    }
}
