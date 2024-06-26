<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle(Request $request, Closure $next, ...$types)
    {
        if (Auth::check() && in_array(Auth::user()->usertype, $types)) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Unauthorized access');
    }
}
