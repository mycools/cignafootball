<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\TeamRepository::class, \App\Repositories\TeamRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MatchRepository::class, \App\Repositories\MatchRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BetRepository::class, \App\Repositories\BetRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RankRepository::class, \App\Repositories\RankRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\InviteRepository::class, \App\Repositories\InviteRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PointLogRepository::class, \App\Repositories\PointLogRepositoryEloquent::class);
        //:end-bindings:
    }
}
