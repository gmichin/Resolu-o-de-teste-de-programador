<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // Adicionar cabeçalhos de CORS básicos
        Response::macro('cors', function ($content = '', $status = 200, $headers = []) {
            $defaultHeaders = [
                'Access-Control-Allow-Origin' => '*', // Modifique conforme necessário
                'Access-Control-Allow-Methods' => 'GET, POST, PATCH, DELETE, OPTIONS',
                'Access-Control-Allow-Headers' => 'Content-Type, Authorization',
            ];

            $headers = array_merge($defaultHeaders, $headers);

            return Response::make($content, $status, $headers);
        });
    }
}
