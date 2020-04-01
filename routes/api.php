<?php

/* @var $router \Illuminate\Support\Facades\Route */
$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/hola', function () use ($router) {
    return $router->app->version();
});
$router->get('/adios', 'UserController@show');
$router->get('/get_activities', 'GetActivitiesController@get');
