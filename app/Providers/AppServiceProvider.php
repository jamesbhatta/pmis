<?php

namespace App\Providers;

use App\FiscalYear;
use App\Observers\FiscalYearObserver;
use App\Observers\OrganizationObserver;
use App\Observers\ProjectObserver;
use App\Organization;
use App\Project;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
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
        Paginator::useBootstrap();
        FiscalYear::observe(FiscalYearObserver::class);
        Project::observe(ProjectObserver::class);

        if(Schema::hasTable('fiscal_years')) {
            // if (!session()->has('active_fiscal_year')) {
                session()->put('active_fiscal_year', runningFiscalYear());
            // }
        }
    }
}
