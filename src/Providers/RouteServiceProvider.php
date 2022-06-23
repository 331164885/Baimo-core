<?php

namespace Baimo\Core\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public function map()
    {
        /**
         * Core admin routes
         **/
        /*Route::middleware('admin')->prefix('admin')->group(function (Router $router) {

        });*/

        /**
         * Core api routes
         **/
        /*Route::middleware(['api', 'auth:api'])->prefix('api')->group(function (Router $router) {

        });*/
    }
}