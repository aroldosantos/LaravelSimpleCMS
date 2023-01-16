<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Contracts\PostRepositoryInterface', 
            'App\Repositories\PostRepository'
        );
        $this->app->bind(
            'App\Contracts\CategoriaRepositoryInterface', 
            'App\Repositories\CategoriaRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
