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

$router->group(['prefix' => 'v1'], function() use ($router) {
    // Persons
    $router->post('persons', 'PersonsController@add');
    $router->get('persons', 'PersonsController@get');
    $router->get('persons/{id}', 'PersonsController@getById');
    $router->put('persons/{id}', 'PersonsController@update');
    $router->delete('persons/{id}', 'PersonsController@delete');

    // Departement
    $router->post('departements', 'DepartementsController@add');
    $router->get('departements', 'DepartementsController@get');
    $router->put('departements/{id}', 'DepartementsController@update');
    $router->delete('departements/{id}', 'DepartementsController@delete');

    // Division
    $router->post('divisions', 'DivisionsController@add');
    $router->get('divisions', 'DivisionsController@get');
    $router->put('divisions/{id}', 'DivisionsController@update');
    $router->delete('divisions/{id}', 'DivisionsController@delete');
    
    // Position
    $router->post('positions', 'PositionsController@add');
    $router->get('positions', 'PositionsController@get');
    $router->put('positions/{id}', 'PositionsController@update');
    $router->delete('positions/{id}', 'PositionsController@delete');
});