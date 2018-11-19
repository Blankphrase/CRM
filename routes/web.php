<?php

/*
|--------------------------------------------------------------------------
| routerlication Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an routerlication.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->router->version();
});

$api = router('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

});

$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');
$router->post('/register', 'AuthController@register');



$router->get('/accounts', 'AccountController@index');
$router->get('/accounts/{account}', 'AccountController@show');
$router->post('/accounts', 'AccountController@store');
$router->put('/accounts/{accounts}','AccountController@update');
$router->delete('/accounts/{accounts}','AccountController@destroy');


$router->get('/accouts/{account}/contact','ContactController@index');
$router->post('/accouts/{account}/contact','ContactController@store');
$router->get('/accouts/{account}/contact/{contact}','ContactController@show');
$router->put('/accouts/{account}/contact/{contact}','ContactController@update');
$router->delete('/accouts/{account}/contact/{contact}','ContactController@destroy');



$router->get('/accouts/{account}/contact/{contact}/opportunity','OpportunityController@index');
$router->post('/accouts/{account}/contact/{contact}/opportunity','OpportunityController@store');
$router->get('/accouts/{account}/contact/{contact}/opportunity/{opportunity}','OpportunityController@show');
$router->put('/accouts/{account}/contact/{contact}/opportunity/{opportunity}','OpportunityController@update');
$router->delete('/accouts/{account}/contact/{contact}/opportunity/{opportunity}','OpportunityController@destroy');


$router->get('/meetings', 'MeetingController@index');
$router->get('/meetings/{account}', 'MeetingController@show');
$router->post('/meetings', 'MeetingController@store');
$router->put('/meetings/{meetings}','MeetingController@update');
$router->delete('/meetings/{meetings}','MeetingController@destroy');


$router->get('/messages', 'MessageController@index');
$router->get('/messages/{message}', 'MessageController@show');
$router->post('/messages', 'MessageController@store');
$router->put('/messages/{messages}','MessageController@update');
$router->delete('/messages/{messages}','MessageController@destroy');