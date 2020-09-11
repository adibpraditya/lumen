<?php

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

$router->get('/', function () use ($router) {
    echo "Welcome to service :)";
    return;
});

$router->group(['prefix' => 'example', 'middleware' => 'appauth'], function () use ($router) {
    //inventory request uker
    $router->get('/',function () use ($router) {
        echo "This is example";
        return;
    });

    $router->get('/{id}','ExampleController@index');
    $router->post('/post/data','ExampleController@post');
});

$router->group(['prefix' => 'user', 'middleware' => 'appauth'], function () use ($router) {
    $router->get('/','UserController@index');
});




