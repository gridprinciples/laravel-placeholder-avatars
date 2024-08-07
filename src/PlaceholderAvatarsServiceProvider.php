<?php

namespace GridPrinciples\PlaceholderAvatars;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class PlaceholderAvatarsServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/placeholder-avatars.php',
            'placeholder-avatars'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/placeholder-avatars.php' => config_path('placeholder-avatars.php'),
        ]);

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'placeholder-avatar');

        Blade::componentNamespace('GridPrinciples\\PlaceholderAvatars\\View\\Components', 'placeholder-avatar');
    }
}
