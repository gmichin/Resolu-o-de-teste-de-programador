<?php

namespace App\Http;

class Kernel extends \Illuminate\Foundation\Http\Kernel
{
    /**
     * O array de middleware globais da aplicação.
     *
     * Estes middleware são executados em todas as requisições para a aplicação.
     *
     * @var array<int,string>
     */
    protected $middleware = [
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        \Fruitcake\Cors\HandleCors::class, 
    ];
    

    /**
     * O array de middleware de grupo da aplicação.
     *
     * Estes middleware são atribuídos a grupos específicos de rotas, como web ou api.
     *
     * @var array<string, array<int,string>>
     */
    protected $middlewareGroups = [
    ];

    /**
     * O array de middleware de rota da aplicação.
     *
     * Estes middleware são aplicados apenas para rotas específicas.
     *
     * @var array<string, class-string|string>
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
