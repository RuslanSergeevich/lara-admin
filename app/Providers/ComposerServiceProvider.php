<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Modules;
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
            $view->with('boxes', Boxes::where('published', 1)->get());
            $view->with('settings', Settings::all());
        });
    }

    public function register()
    {
        //
    }
}
