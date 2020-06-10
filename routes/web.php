<?php

use Illuminate\Support\Str;

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

$router->get('/key', function() {
    return Str::random(32);
});

$router->get('/user/{id}', function($id) {
    return 'User ID : ' . $id;
});

$router->get('/post/{postId}/comments/{commentId}', function($postId, $commentId){
    return 'Post ID : ' . $postId . ' Comment ID : ' . $commentId;
});

$router->get('/optional[/{param}]', function($param = null) {
    return $param;
});

$router->get('profile', function() {
    return redirect()->route('route.profile');
});

$router->get('profile/idstack', ['as' => 'route.profile', function() {
    return 'Route IDStack';
}]);