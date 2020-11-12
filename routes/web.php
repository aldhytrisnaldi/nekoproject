<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// AUTH
$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->get('logout', 'AuthController@logout');
    $router->get('users', 'UserController@getAll');
    $router->get('users/{id}', 'UserController@getById');
});

// PERSON
$router->group(['prefix' => 'v1'], function() use ($router) {
    $router->post('persons', 'PersonsController@add');
    $router->get('persons', 'PersonsController@get');
    $router->get('persons/{id}', 'PersonsController@getById');
    $router->put('persons/{id}', 'PersonsController@update');
    $router->delete('persons/{id}', 'PersonsController@delete');
});