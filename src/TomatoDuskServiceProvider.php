<?php

namespace TomatoPHP\TomatoDusk;

use Illuminate\Support\ServiceProvider;
use TomatoPHP\TomatoDusk\Console\TestGeneratorCommand;
use TomatoPHP\TomatoDusk\Console\TomatoDuskInstall;
use TomatoPHP\TomatoDusk\Console\TomatoDuskRun;

use TomatoPHP\TomatoAdmin\Services\Contracts\Menu;
use TomatoPHP\TomatoAdmin\Facade\TomatoMenu;


class TomatoDuskServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //Register generate command
        $this->commands([
            TomatoDuskInstall::class,
            TestGeneratorCommand::class,
            TomatoDuskRun::class
        ]);

        //Register Config file
        $this->mergeConfigFrom(__DIR__.'/../config/tomato-dusk.php', 'tomato-dusk');

        //Publish Config
        $this->publishes([
           __DIR__.'/../config/tomato-dusk.php' => config_path('tomato-dusk.php'),
        ], 'tomato-dusk-config');

        //Register Migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        //Publish Migrations
        $this->publishes([
           __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'tomato-dusk-migrations');

        //Register views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'tomato-dusk');

        //Publish Views
        $this->publishes([
           __DIR__.'/../resources/views' => resource_path('views/vendor/tomato-dusk'),
        ], 'tomato-dusk-views');

        //Register Langs
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tomato-dusk');

        //Publish Lang
        $this->publishes([
           __DIR__.'/../resources/lang' => app_path('lang/vendor/tomato-dusk'),
        ], 'tomato-dusk-lang');

        //Register Routes
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

    }

    public function boot(): void
    {
        TomatoMenu::register(
            Menu::make()
                ->label("Dusk")
                ->group(__('Tools'))
                ->icon("bx bx-test-tube")
                ->route("admin.test-logs.index")
        );
    }
}
