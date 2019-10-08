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

$router->post('/register', 'Credentials\UserCredentialsController@register');
$router->post('/login', 'Credentials\UserCredentialsController@login');

$router->group(['prefix'=>'profile'],function () use ($router){
    $router->get('/','Profile\ProfileController@index');
    $router->post('/update','Profile\ProfileController@UpdateProfile');
});
