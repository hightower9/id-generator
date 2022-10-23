<?php

namespace Hightower\IdGenerator;

use Illuminate\Support\ServiceProvider;

class IDGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(IDGenerator::class, fn () => new IDGenerator());
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
