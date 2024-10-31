<?php

namespace Backpack\Pan;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Pan\PanConfiguration;


class BackpackPanServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/pan.php', 'backpack.pan');

        Route::group([
            'prefix'     => config('backpack.base.route_prefix', 'admin'),
            'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
        ], function () {
            Route::crud(config('backpack.pan.panel_route_prefix'), config('backpack.pan.controller'));
        });
    }

    public function boot()
    {
        $this->loadTranslationsFrom(realpath(__DIR__.'/../resources/lang'), 'backpack-pan');

        $this->publishes([
            __DIR__.'/config/pan.php' => config_path('backpack/pan.php'),
        ], 'pan-config');

        PanConfiguration::allowedAnalytics([
            "my-button",
            "welcome-page",
            "welcome-login-link",
            "welcome-docs-link",
            "welcome-github-link",
            "welcome-contact-link",
            "login-form",
            "menu-item-dashboard",
            "menu-item-addons",
            "menu-item-petshop",
            "menu-item-news",
            "menu-item-auth",
            "menu-item-filemanager",
            "menu-item-activity-log",
            "menu-item-translation-manager",
            "menu-item-calendar-operation",
            "menu-item-backup-manager",
            "menu-item-log-manager",
            "menu-item-settings",
            "menu-item-page-manager",
            "menu-item-menu-manager",
            "menu-item-analytics",
          ]);

          PanConfiguration::routePrefix(config('backpack.pan.events_route_prefix', 'pan'));
    }
}
