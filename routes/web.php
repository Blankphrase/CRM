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
    
    $api->get('/accounts/{account}', 'AccountController@show');    
    
    $api->get('/contact','ContactController@index');
    $api->post('/contact','ContactController@store');
    $api->get('/contact/{contact}','ContactController@show');
    $api->put('/contact/{contact}','ContactController@update');
    $api->delete('/contact/{contact}','ContactController@destroy');
    
    
    
    $api->get('/contact/{contact}/opportunity','OpportunityController@index');
    $api->post('/contact/{contact}/opportunity','OpportunityController@store');
    $api->get('/contact/{contact}/opportunity/{opportunity}','OpportunityController@show');
    $api->put('/contact/{contact}/opportunity/{opportunity}','OpportunityController@update');
    $api->delete('/contact/{contact}/opportunity/{opportunity}','OpportunityController@destroy');
    
    
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