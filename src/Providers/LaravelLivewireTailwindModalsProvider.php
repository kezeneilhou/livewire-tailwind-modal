<?php

namespace Kezeneilhou\LaravelLivewireTailwindModals\Providers;

use Kezeneilhou\LaravelLivewireTailwindModals\Components\Modals;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class LaravelLivewireTailwindModalsProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'livewire-tailwind-modal');

        $this->publishes(
            [__DIR__ . '/../../resources/views' => resource_path('views/vendor/livewire-tailwind-modal')],
            ['livewire-tailwind-modal', 'livewire-tailwind-modal:views']
        );

        // Register the component
        Livewire::component('modals', Modals::class);
    }
}