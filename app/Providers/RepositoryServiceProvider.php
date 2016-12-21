<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\MyModelRepository::class, \App\Repositories\MyModelRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MyModel2Repository::class, \App\Repositories\MyModel2RepositoryEloquent::class);
         $this->app->bind(\App\Repositories\CondominioRepository::class, \App\Repositories\CondominioRepositoryEloquent::class);
                $this->app->bind(\App\Repositories\PessoaRepository::class, \App\Repositories\PessoaRepositoryEloquent::class);
        //:end-bindings:
    }
}
