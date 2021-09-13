<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        *   paginator::useBootstrap(); Para utilizar Bootstrap en lugar de TailWind
        *   Model::unguard(); Para aplicarle a todos los modelos el protected $guarded = [];
        */

        Gate::define('admin', function (User $user) {
            return $user->username === 'EddyRufino';
        });

        Blade::if('admin', function () {
            return optional(auth()->user())->can('admin');
        });
    }
}
