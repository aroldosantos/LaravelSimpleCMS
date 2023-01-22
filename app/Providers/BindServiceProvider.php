<?php

/**
 * @author      Aroldo de Moura Santos
 * @copyright   2023 Aroldo de Moura Santos
 * @license     GPL-3.0 license
 * @link        https://github.com/aroldosantos/LaravelSimpleCMS
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class BindServiceProvider ServiceProvider
 */
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
            'App\Contracts\CategoryRepositoryInterface',
            'App\Repositories\CategoryRepository'
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
