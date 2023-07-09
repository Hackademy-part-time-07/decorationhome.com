<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RevisorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Aquí puedes realizar la lógica de validación y redirección para el revisor
        
        return $next($request);
    }
}

