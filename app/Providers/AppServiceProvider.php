<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                     ->label('Shop')
                     ->icon('heroicon-s-shopping-cart'),
                NavigationGroup::make()
                    ->label('Blog')
                    ->icon('heroicon-s-pencil'),
                NavigationGroup::make()
                    ->label('ADMIN MANAGEMENT')
                    ->icon('heroicon-s-cog')
                    ->collapsed(),
            ]);

            Filament::registerNavigationItems([
                NavigationItem::make('Analytics')
                    ->url('https://filament.pirsch.io', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-presentation-chart-line')
                    ->activeIcon('heroicon-s-presentation-chart-line')
                    ->group('Reports')
                    ->sort(3),
            ]);
        });
    }
}
