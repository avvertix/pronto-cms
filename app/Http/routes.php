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

/* Home Route - Handles the application index */
$app->get('/', [
    'as' => 'home', 
    'uses' => 'PageController@index'
]);
// $app->get('/a/{page:[A-Za-z0-9\-\/]+}', [
//     'as' => 'page', 
//     'uses' => 'AssetsController@show'
// ]);
// $app->get('/i/{page:[A-Za-z0-9\-\/]+}', [
//     'as' => 'page', 
//     'uses' => 'ImagesController@show'
// ]);

/* Page Route - Handles the show for the general pages */
$app->get('/{page:[A-Za-z0-9\-\/]+}', [
    'as' => 'page', 
    'uses' => 'PageController@show'
]);


// /i/{slug,name}[/200x200] => image assets route with support for resizing and scale parameters => cache based on file path hash and request parameters
// /a/{slug,name} => generic assets route
