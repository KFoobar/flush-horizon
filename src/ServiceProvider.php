<?php

namespace KFoobar\Horizon;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use KFoobar\Horizon\Commands\FlushHorizonCommand;
use KFoobar\Horizon\Commands\ResetHorizonCommand;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FlushHorizonCommand::class,
                ResetHorizonCommand::class,
            ]);
        }
    }
}
