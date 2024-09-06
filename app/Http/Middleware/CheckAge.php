<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    public function handle($request, Closure $next)
    {
        // Lógica del middleware
        return $next($request);
    }
}

