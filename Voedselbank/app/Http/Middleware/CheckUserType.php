<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle(Request $request, Closure $next, string $type)
    {
        if (Auth::check() && Auth::user()->usertype === $type) {
            return $next($request);
        }

        abort(403, 'Niet bevoegd'); // 403: Forbidden
    }
}
