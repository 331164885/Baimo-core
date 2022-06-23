<?php

namespace Baimo\Core\Providers;

use Exception;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Application;
use Baimo\Core\Facades\Baimo;
use Illuminate\Support\ServiceProvider;
use Baimo\Core\Providers\RouteServiceProvider;
use Baimo\Core\Models\BaseModel;

// Core模块服务注册
class ModulesServiceProvider extends ServiceProvider
{
    /**
     * 服务使用前的准备工作
     **/
    public function boot()
    {

    }

    /**
     * 注册服务
     **/
    public function register()
    {
        $app = $this->app;

        // 注册路由服务提供者
        //$app->register(RouteServiceProvider::class);

        // 注册命令
        /*if ($app->runningInConsole()) {
            $this->commands([
                CreateAdmin::class,
                Database::class,
                Install::class,
                Publish::class
            ]);
        }*/

        $app->bind('Baimo', BaseModel::class);
    }


}