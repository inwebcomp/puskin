<?php

namespace Admin\ResourceTools\Comments;

use Illuminate\Support\ServiceProvider;
use InWeb\Admin\App\Admin;
use InWeb\Admin\App\AdminRoute;
use InWeb\Admin\App\Events\ServingAdmin;

class ResourceToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Admin::serving(function (ServingAdmin $event) {
            Admin::script('comments', __DIR__.'/../dist/js/resource-tool.js');
            Admin::style('comments', __DIR__.'/../dist/css/resource-tool.css');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        AdminRoute::api('\Admin\ResourceTools\Comments', function () {
            $this->registerRoutes();
        });
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
    }
}
