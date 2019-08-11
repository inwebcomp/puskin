<?php

namespace App\Providers;

use App\Http\View\Composers\BannersComposer;
use App\Http\View\Composers\BottomMenuComposer;
use App\Http\View\Composers\DailyNewsComposer;
use App\Http\View\Composers\IndexEventsComposer;
use App\Http\View\Composers\IndexNewsComposer;
use App\Http\View\Composers\OtherNewsComposer;
use App\Http\View\Composers\TopMenuComposer;
use Blade;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('*', function ($view) {
            $view->with('locale', App::getLocale());
        });

        View::composer(['blocks.menu', 'blocks.mobile-menu'], TopMenuComposer::class);
        View::composer('blocks.footer', BottomMenuComposer::class);

        View::composer('news.other', OtherNewsComposer::class);
        View::composer('news.index', IndexNewsComposer::class);
        View::composer('news.daily', DailyNewsComposer::class);
        View::composer('news.daily-big', DailyNewsComposer::class);

        View::composer('events.index', IndexEventsComposer::class);

        View::composer('blocks.slider', BannersComposer::class);

//        View::composer('blocks.languages', function($view) {
//            $path = '';
//
//            $view->with('alternative', $path);
//        });

        Blade::if('admin', function () {
            return auth()->guard('admin')->check();
        });
    }
}