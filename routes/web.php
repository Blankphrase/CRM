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

    $api->resources([

        'auths' => 'AuthController',
        'accounts' => 'AccountController',
        'contacts' => 'ContactController',
        'meetings' => 'MeetingController',
        'messages' => 'MessageController'
    ]);

});
