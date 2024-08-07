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
        Route::view('/', 'test-avatars');

        PlaceholderAvatars::route('face.svg',
            // type: 'beam',
            // colors: ['#440000', '#110000', '#CC0000'],
            // name: 'wut',
            // square: false,
        )->name('face');
    }
}
