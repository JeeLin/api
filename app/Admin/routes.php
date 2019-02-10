<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix' => config('admin.route.prefix'),
    'namespace' => config('admin.route.namespace'),
    'middleware' => config('admin.route.middleware'),
], function (Router $router) {

    $router->resource('/', BookController::class);
    $router->resource('banner', BannerController::class);
    $router->resource('book', BookController::class);
    $router->resource('user', UserController::class);
    $router->resource('authencation', AuthencationController::class);
    $router->resource('type', TypeController::class);
});
