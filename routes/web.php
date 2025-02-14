<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->get('/product', 'ProductController@index');
// $router->get('/product/{id}', 'ProductController@show');
// $router->post('/product/create', 'ProductController@store');
// $router->put('/product/update/{id}', 'ProductController@update');
// $router->delete('/product/delete/{id}', 'ProductController@destroy');

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
});


$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->get('me', 'AuthController@me');
});







$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/product', 'ProductController@index');
});
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/product/{id}', 'ProductController@show');
});
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->post('/product/create', 'ProductController@store');
});
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->put('/product/update/{id}', 'ProductController@update');
});
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    $router->delete('/product/delete/{id}', 'ProductController@destroy');
});
