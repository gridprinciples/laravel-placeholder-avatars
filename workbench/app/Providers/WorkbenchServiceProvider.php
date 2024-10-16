<?php

namespace Workbench\App\Providers;

use GridPrinciples\PlaceholderAvatars\Facades\PlaceholderAvatars;
use GridPrinciples\PlaceholderAvatars\View\Components\Beam;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class WorkbenchServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::view('/', 'test-beam');
        Route::view('/marble', 'test-marble');
        Route::view('/pixel', 'test-pixel');

        PlaceholderAvatars::route('face.svg',
            // type: 'beam',
            // colors: ['#440000', '#110000', '#CC0000'],
            // name: 'wut',
            // square: false,
        )->name('face');

        PlaceholderAvatars::route('marble.svg',
            type: 'marble',
            // colors: ["#8e3f65", "#73738d", "#72a5ae", "#98e9d0", "#d8ffcc"],
            // name: 'wut',
            // square: false,
        )->name('marble');

        PlaceholderAvatars::route('pixel.svg',
            type: 'pixel',
            // colors: ["#8e3f65", "#73738d", "#72a5ae", "#98e9d0", "#d8ffcc"],
            // name: 'wut',
            // square: false,
        )->name('pixel');

    }
}
