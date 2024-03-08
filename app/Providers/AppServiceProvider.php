<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AuthService;
use App\Services\AuthInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{


    
    /**
     * Register any application services.
     */
    public function register(): void
    {

        $this->app->bind(AuthInterface::class, AuthService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        
        $this->app->bind(
            'App\Services\AuthInterface',
            'App\Services\AuthService'
        );

        
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
