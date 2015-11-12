<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Site Title
    |--------------------------------------------------------------------------
    |
    | 
    |
    | Supported: 
    |
    */

    'title' => env('PRONTO_APP_TITLE', 'Your Pronto &micro;-site'),
    
    'logo' => env('PRONTO_APP_LOGO', 'logo.png'),
    
    'theme' => env('PRONTO_APP_THEME', 'default'),
    
    'allow_json_config' => env('PRONTO_CONFIG_ALLOW_JSON', false),
    
    
    'sections_in_menu' => env('PRONTO_CONFIG_INCLUDE_FIRST_LEVEL_SECTIONS_IN_MENU', false),
    
    
    'content_folder' => realpath(storage_path('content')),
    
    'image_folder' => realpath(storage_path('images')),
    
    'assets_folder' => realpath(storage_path('assets')),


    

];
