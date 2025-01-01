<?php

namespace App\Providers;

use App\Models\AboutMeAndSkill;
use App\Models\GeneralDeveloperInformation;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $info = GeneralDeveloperInformation::first();
            $socials = SocialMedia::get();
            $skills = AboutMeAndSkill::get();

            $view->with([
                'info' => $info,
                'socials' => $socials ? $socials->toArray() : [],
                'skills' => $skills ? $skills->toArray() : [],
            ]);
        });
    }
}
