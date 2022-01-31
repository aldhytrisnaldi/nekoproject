<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// Authentication
$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->get('logout', 'AuthController@logout');
});

//  Users
$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('user', 'UserController@getAll');
    $router->get('user/{id}', 'UserController@getById');
});

// Employee
$router->post('employee', 'EmployeesController@add');
$router->get('employee', 'EmployeesController@get');
$router->get('employee/{id}', 'EmployeesController@getById');
$router->put('employee/{id}', 'EmployeesController@update');
$router->delete('employee/{id}', 'EmployeesController@delete');

// Organization
$router->group(['prefix' => 'v1/organization'], function() use ($router) {
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

// Master Data
$router->group(['prefix' => 'v1/masterdata'], function () use ($router) {
    // Blood Type
    $router->post('blood-types', 'MdBloodTypesController@add');
    $router->get('blood-types', 'MdBloodTypesController@get');
    $router->put('blood-types/{id}', 'MdBloodTypesController@update');
    $router->delete('blood-types/{id}', 'MdBloodTypesController@delete');

    // Education
    $router->post('education', 'MdEducationController@add');
    $router->get('education', 'MdEducationController@get');
    $router->put('education/{id}', 'MdEducationController@update');
    $router->delete('education/{id}', 'MdEducationController@delete');

     // Employee Status
     $router->post('employee-status', 'MdEmployeeStatusesController@add');
     $router->get('employee-status', 'MdEmployeeStatusesController@get');
     $router->put('employee-status/{id}', 'MdEmployeeStatusesController@update');
     $router->delete('employee-status/{id}', 'MdEmployeeStatusesController@delete');

     // Gender
     $router->post('gender', 'MdGendersController@add');
     $router->get('gender', 'MdGendersController@get');
     $router->put('gender/{id}', 'MdGendersController@update');
     $router->delete('gender/{id}', 'MdGendersController@delete');
});
