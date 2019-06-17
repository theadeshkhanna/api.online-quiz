<?php

$api = app('Dingo\Api\Routing\Router');
$baseControllersPath = 'App\Api\v1\Controllers';

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$api->version('v1', function(\Dingo\Api\Routing\Router $api) use ($baseControllersPath) {

    $api->post('register', $baseControllersPath . 'AuthController@register');
});
