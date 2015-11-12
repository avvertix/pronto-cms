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

/**
    Home Route
    Handles the application index
*/
$app->get('/', ['as' => 'home', function(){
    
    // dd(content()->pages());
    
    // Need ViewResolver service to get the view based on the applied theme
    
    return pageview(content_path('index.md'), 'default.frontpage');
}]);


// /[{section}/[{sub-section}]/[{sub-sub-section}]/]{page} => general page route, must support first level page, and Nth level page with N folder nesting

// /i/{slug,name}[/200x200] => image assets route with support for resizing and scale parameters => cache based on file path hash and request parameters
// /a/{slug,name} => generic assets route
