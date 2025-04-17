<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Model::preventLazyLoading();
        //can be done here for preventLazyLoading as the begining but will give error if lazy loading is done.
        Paginator::useTailwind();

        // Gate defination for global reach
    //     Gate::define('edit-job',function (User $user,Job $job){
    //    return $job->employer->user->is($user);
    //     });replaced with policy
    }
}
