<?php

namespace app\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function boot(Router $router)
    {
        $router->model('menu', 'App\Menu');

        $router->model('page', 'App\Post');

        $router->model('product', 'App\Post');

        $router->model('user', 'App\User');

        $router->model('static', 'App\StaticContent');

        $router->model('contact', 'App\Contact');

        $router->model('customergroup', 'App\CustomerGroup');

        $router->model('attribute', 'App\Attribute');

        $router->model('category', 'App\Category');

        $router->model('role', 'App\Role');

        $router->model('permission', 'App\Permission');

        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
