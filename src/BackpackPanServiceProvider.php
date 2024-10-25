<?php

namespace Backpack\Pan;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BackpackPanServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/pan.php', 'backpack.pan');

        Route::group([
            'prefix'     => config('backpack.base.route_prefix', 'admin'),
            'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
        ], function () {
            Route::crud(config('backpack.pan.route_prefix'), PanAnalyticsCrudController::class);
        });
    }

    public function boot()
    {
        $this->loadTranslationsFrom(realpath(__DIR__.'/../resources/lang'), 'backpack-pan');
    }
}
