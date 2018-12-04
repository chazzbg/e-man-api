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

/** @var \Laravel\Lumen\Routing\Router $router */

use App\User;

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->group(['prefix' => 'api'], function ($router){
    /** @var \Laravel\Lumen\Routing\Router $router */
    $router->post('/register', 'RegistrationController@register');

    $router->put('/location', function (\Illuminate\Http\Request $request) {

    });

    $router->get('/version', function ($clientVersion) {

    });

    $router->put('/version', function (\Illuminate\Http\Request $request) {

    });
});
