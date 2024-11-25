<?php

namespace App\Http\Middleware;

class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*') // permite todas as origens
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Request-With')
            ->header('Access-Control-Allow-Credentials', 'true');
    }
}