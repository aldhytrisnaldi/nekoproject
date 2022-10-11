<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Authentication
$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('login', 'AuthController@login');
    $router->get('logout', 'AuthController@logout');
});

//  Users
$router->group(['prefix' => 'user'], function () use ($router) {
    $router->post('register', 'UserController@register');
    $router->get('users', 'UserController@getAll');
    $router->get('user/{id}', 'UserController@getById');
});

// Employee
$router->post('employee', 'EmployeesController@add');
$router->get('employee', 'EmployeesController@get');
$router->get('employee/{id}', 'EmployeesController@getById');
$router->put('employee/{id}', 'EmployeesController@update');
$router->delete('employee/{id}', 'EmployeesController@delete');

// Master Data
$router->group(['prefix' => 'v1/masterdata'], function () use ($router) {
    // Menu Type
    $router->get('menu-type', 'Masterdata\MenuType@get');
    $router->post('menu-type', 'Masterdata\MenuType@add');
    $router->put('menu-type/{id}', 'Masterdata\MenuType@update');
    $router->delete('menu-type/{id}', 'Masterdata\MenuType@delete');

    // Menu
    $router->get('menu', 'Masterdata\Menu@get');
    $router->post('menu', 'Masterdata\Menu@add');
    $router->put('menu/{id}', 'Masterdata\Menu@update');
    $router->delete('menu/{id}', 'Masterdata\Menu@delete');
});
