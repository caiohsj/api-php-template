<?php

use Illuminate\Http\Request;

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api/v1', 'middleware' => ['locale']], function () use ($router) {
    $router->post('sign_in', 'AuthController@signIn');
});

$router->group(['prefix' => 'api/v1', 'middleware' => ['locale', 'auth']], function () use ($router) {
    // Routes for authenticaded users
});
