<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;

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
        View::composer('includes.teachersidebar', function ($view) {
            // $faculty_number = Auth::id();
            $faculty_number = '25-44734';
            $schedules = Schedule::where('faculty_number', $faculty_number)->get();
            $view->with('schedules', $schedules);
        });
    }
}
