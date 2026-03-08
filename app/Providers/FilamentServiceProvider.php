<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Panel;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Register a default panel
        Filament::registerPanel(
            Panel::make()
                ->id('admin')          // Panel ID
                ->path('admin')        // URL path
                ->default()            // Mark as default
        );
    }
}