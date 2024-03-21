<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();
        //Mengatur Hak Akses untuk Apoteker
        Gate::define('admin-only', function ($user) {
        if ($user->level == 'Admin'){
        return true; 
        } 
        return false; 
        });
        //Mengatur Hak Akses untuk Gudang
        Gate::define('operator-only', function ($user) {
        if ($user->level == 'Operator'){
        return true; 
        } 
        return false; 
        });
        //Mengatur Hak Akses untuk Kasir
        Gate::define('pelanggan-only', function ($user) {
        if ($user->level == 'Pelanggan'){
        return true; 
        } 
        return false; 
        });
        //Mengatur Hak Akses untuk Pemilik
        Gate::define('pemilik-only', function ($user) {
        if ($user->level == 'Pemilik'){
        return true; 
        } 
        return false; 
        });
    }
}