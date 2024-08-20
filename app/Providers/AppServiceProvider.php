<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Pengajuan;

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
        Paginator::useBootstrap();
        $statusCounts = [];
        for ($i = 1; $i <= 4; $i++) {
            $statusCounts[$i] = Pengajuan::where('status_id', $i)->count();
        }
    
        // Share these counts with all views
        View::share('statusCounts', $statusCounts);
    }
}
