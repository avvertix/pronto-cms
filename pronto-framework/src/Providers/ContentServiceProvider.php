<?php

namespace Pronto\Providers;


use Illuminate\Support\ServiceProvider;
use ParsedownExtra;
use Pronto\Content\Content;

class ContentServiceProvider extends ServiceProvider
{
    /**
        * Register bindings in the container.
        *
        * @return void
        */
        public function register()
        {
            $this->app->bind('Pronto\Contracts\Content', 'Pronto\Content\Content');
            
            // , function ($app) {
            //     
            //     return new Content(app('Illuminate\Filesystem\Filesystem'), content_path());
            // });
            // 
            
            
            // $this->app->singleton('Riak\Contracts\Connection', function ($app) {
            //     return new Connection(config('riak'));
            // });
        }
        
        public function boot(){
            view()->share('global_menu', content()->pages());
            // view()->share('app_title', 'ciao');
            // view()->share('app_logo', 'ciao');
        }
}
