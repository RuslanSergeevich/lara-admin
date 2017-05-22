<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules;
use App\Pages;
use App\Boxes;
use App\Settings;
use View;
class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        View::composer('*', function($view)
        {
            $view->with('menu_modules', Modules::where('published', 1)->orderBy('position', 'asc')->get());
            $view->with('top_menu', Pages::with('children')->where('parent_id','=',0)->get());
            $view->with('footer_menu', Pages::wherePublishedAndFooter_menu(1, 1)->orderBy('id', 'asc')->get());
            $view->with('boxes', Boxes::where('published', 1)->get());
            $view->with('settings', Settings::findOrFail(1));
        });
    }

    public function register()
    {
        //
    }
}
