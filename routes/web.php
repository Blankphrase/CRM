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

    
    $api->post('/login', 'AuthController@login');
    $api->get('/logout', 'AuthController@logout');
    $api->post('/register', 'AuthController@register');
    
    
    
    $api->get('/accounts', 'AccountController@index');
    $api->get('/accounts/{account}', 'AccountController@show');
    $api->post('/accounts', 'AccountController@store');
    $api->put('/accounts/{accounts}','AccountController@update');
    $api->delete('/accounts/{accounts}','AccountController@destroy');
    
    
    $api->get('/accouts/{account}/contact','ContactController@index');
    $api->post('/accouts/{account}/contact','ContactController@store');
    $api->get('/accouts/{account}/contact/{contact}','ContactController@show');
    $api->put('/accouts/{account}/contact/{contact}','ContactController@update');
    $api->delete('/accouts/{account}/contact/{contact}','ContactController@destroy');
    
    
    
    $api->get('/accouts/{account}/contact/{contact}/opportunity','OpportunityController@index');
    $api->post('/accouts/{account}/contact/{contact}/opportunity','OpportunityController@store');
    $api->get('/accouts/{account}/contact/{contact}/opportunity/{opportunity}','OpportunityController@show');
    $api->put('/accouts/{account}/contact/{contact}/opportunity/{opportunity}','OpportunityController@update');
    $api->delete('/accouts/{account}/contact/{contact}/opportunity/{opportunity}','OpportunityController@destroy');
    
    
    $api->get('/meetings', 'MeetingController@index');
    $api->get('/meetings/{account}', 'MeetingController@show');
    $api->post('/meetings', 'MeetingController@store');
    $api->put('/meetings/{meetings}','MeetingController@update');
    $api->delete('/meetings/{meetings}','MeetingController@destroy');
    
    
    $api->get('/messages', 'MessageController@index');
    $api->get('/messages/{message}', 'MessageController@show');
    $api->post('/messages', 'MessageController@store');
    $api->put('/messages/{messages}','MessageController@update');
    $api->delete('/messages/{messages}','MessageController@destroy');
});