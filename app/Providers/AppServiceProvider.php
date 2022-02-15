<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
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
        Carbon::setLocale( App::getLocale() );

        \App\Page::observe(\App\Observers\NodeObserver::class);

        Blade::directive('isMobile', function () {
            return "<?php if ( HtmlHelper::isMobile() ): ?>";
        });

        Blade::directive('notMobile', function () {
            return "<?php if ( !HtmlHelper::isMobile() ): ?>";
        });
    }
}
