<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// AUTH
$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->get('logout', 'AuthController@logout');
    $router->get('user', 'UserController@getAll');
    $router->get('user/{id}', 'UserController@getById');
});

$router->group(['prefix' => 'v1'], function() use ($router) {
    // Employee
    $router->post('employee', 'EmployeesController@add');
    $router->get('employee', 'EmployeesController@get');
    $router->get('employee/{id}', 'EmployeesController@getById');
    $router->put('employee/{id}', 'EmployeesController@update');
    $router->delete('employee/{id}', 'EmployeesController@delete');

    // Departement
    $router->post('departement', 'DepartementsController@add');
    $router->get('departement', 'DepartementsController@get');
    $router->put('departement/{id}', 'DepartementsController@update');
    $router->delete('departement/{id}', 'DepartementsController@delete');

    // Division
    $router->post('division', 'DivisionsController@add');
    $router->get('division', 'DivisionsController@get');
    $router->put('division/{id}', 'DivisionsController@update');
    $router->delete('division/{id}', 'DivisionsController@delete');
    
    // Position
    $router->post('position', 'PositionsController@add');
    $router->get('position', 'PositionsController@get');
    $router->put('position/{id}', 'PositionsController@update');
    $router->delete('position/{id}', 'PositionsController@delete');
});