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
        // ...
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'placeholder-avatar');

        Blade::componentNamespace('GridPrinciples\\PlaceholderAvatars\\View\\Components', 'placeholder-avatar');
    }
}
