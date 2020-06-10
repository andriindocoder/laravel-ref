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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/key', 'ExampleController@generateKey');
$router->get('/fail', function() {
    return 'Not yet mature';
});

$router->get('/user/{id}', 'ExampleController@getUser');
$router->get('/post/cat1/{cat1}/cat2/{cat2}', 'ExampleController@getPost');
$router->get('/profile', ['as' => 'profile', 'uses' => 'ExampleController@getProfile']);
$router->get('/profile/action', ['as' => 'profile.action', 'uses' =>  'ExampleController@getProfileAction']);

$router->get('/foo/bar', 'ExampleController@fooBar');
$router->get('/bar/foo', 'ExampleController@fooBar');
$router->post('/user/profile/request', 'ExampleController@userProfile');

$router->get('/response', 'ExampleController@response');

$router->post('/register', 'AuthController@register');
$router->post('/login', 'AuthController@login');