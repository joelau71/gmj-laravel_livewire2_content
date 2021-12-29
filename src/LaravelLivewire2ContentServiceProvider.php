<?php

namespace GMJ\LaravelLivewire2Content;

use GMJ\LaravelLivewire2Content\Http\Livewire\Backend;
use GMJ\LaravelLivewire2Content\View\Components\Frontend;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire;

class LaravelLivewire2ContentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->loadRoutesFrom(__DIR__ . "/routes/web.php", 'LaravelLivewire2Content');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'LaravelLivewire2Content');

        Blade::component('LaravelLivewire2Content', Frontend::class);
        Livewire::component("LaravelLivewire2ContentLivewire", Backend::class);

        $this->publishes([
            __DIR__ . '/database/seeders' => database_path('seeders'),
        ], 'GMJ\LaravelLivewire2Content');
    }


    public function register()
    {
    }
}
