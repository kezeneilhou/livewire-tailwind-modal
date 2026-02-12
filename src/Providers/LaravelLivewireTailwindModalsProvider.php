<?php

namespace Kezeneilhou\LaravelLivewireTailwindModals\Providers;

use Kezeneilhou\LaravelLivewireTailwindModals\Components\Modals;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LaravelLivewireTailwindModalsProvider extends ServiceProvider
{
    public function boot()
    {
        // 1. Load Views
        $this->loadViewsFrom(
            __DIR__ . '/../../resources/views',
            'livewire-tailwind-modal'
        );

        // 2. Publish Views
        $this->publishes([
            __DIR__ . '/../../resources/views'
            => resource_path('views/vendor/livewire-tailwind-modal'),
        ], 'livewire-tailwind-modal:views');

        // 3. Publish JS to resources (for Vite bundling)
        $this->publishes([
            __DIR__ . '/../../resources/js'
            => resource_path('js/vendor/livewire-tailwind-modal'),
        ], 'livewire-tailwind-modal:assets');

        // 4. Register Livewire component
        Livewire::component('modals', Modals::class);
    }
}
