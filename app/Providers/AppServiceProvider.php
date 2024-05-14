<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;;

class AppServiceProvider extends ServiceProvider
{
    public $bindings=[

        // Repositories

        'App\Repositories\Interfaces\BaseRepositoryInterface'=>
        'App\Repositories\BaseRepository',

        'App\Repositories\Interfaces\Department\DepartmentRepositoryInterface'=>
        'App\Repositories\Department\DepartmentRepository',

        'App\Repositories\Interfaces\Position\PositionRepositoryInterface'=>
        'App\Repositories\Position\PositionRepository',

        'App\Repositories\Interfaces\Specialized\SpecializedRepositoryInterface'=>
        'App\Repositories\Specialized\SpecializedRepository',

        'App\Repositories\Interfaces\Level\LevelRepositoryInterface'=>
        'App\Repositories\Level\LevelRepository',

        'App\Repositories\Interfaces\Salary\SalaryRepositoryInterface'=>
        'App\Repositories\Salary\SalaryRepository',

        'App\Repositories\Interfaces\Employee\EmployeeRepositoryInterface'=>
        'App\Repositories\Employee\EmployeeRepository',

        // services

        'App\Services\Interfaces\Department\DepartmentServiceInterface'=>
        'App\Services\Department\DepartmentService',

        'App\Services\Interfaces\Position\PositionServiceInterface'=>
        'App\Services\Position\PositionService',

        'App\Services\Interfaces\Specialized\SpecializedServiceInterface'=>
        'App\Services\Specialized\SpecializedService',

        'App\Services\Interfaces\Level\LevelServiceInterface'=>
        'App\Services\Level\LevelService',

        'App\Services\Interfaces\Salary\SalaryServiceInterface'=>
        'App\Services\Salary\SalaryService',
       
        'App\Services\Interfaces\Employee\EmployeeServiceInterface'=>
        'App\Services\Employee\EmployeeService',
           ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach($this->bindings as $key => $val){      
            $this->app->bind($key,$val);
        }

        // Sanctum::getAccessTokenFromRequestUsing(function($request){
        //     return $request->cookie('apiAuth_token');
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    //    
    }
}
