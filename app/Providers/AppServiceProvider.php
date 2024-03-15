<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;;

class AppServiceProvider extends ServiceProvider
{
    public $bindings=[
        'App\Services\Interfaces\Department\DepartmentServiceInterface'=>
        'App\Services\Department\DepartmentService',

        'App\Repositories\Interfaces\BaseRepositoryInterface'=>
        'App\Repositories\BaseRepository',

        'App\Repositories\Interfaces\Department\DepartmentRepositoryInterface'=>
        'App\Repositories\Department\DepartmentRepository',

        
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach($this->bindings as $key => $val){      
            $this->app->bind($key,$val);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    //    
    }
}
