<?php

namespace Kezeneilhou\LaravelLivewireTailwindModals\Components;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\On;

class Modals extends Component
{
    public $alias;
    public $params = [];
    public $backdrop;
    public $message;
    public $activemodal;
    public $size;
    public $title;

    public function render()
    {
        Log::info('yello');
        return view('livewire-tailwind-modal::modals');
    }
    #[On('hideModal')]
    public function hideModal()
    {
        $this->dispatch('close-global-modal');
    }
    #[On('showModal')]
    public function showModal($data)
    {

        $this->alias = $data['alias'];
        $this->params = $data['params'] ?? [];
        $this->size = $data['size'] ?? '6';
        $this->title = $data['title'] ??'Modal';
        $this->activemodal = rand();
        $this->dispatch('open-global-modal');
    }
    #[On('resetModal')]
    public function resetModal()
    {
        $this->reset();

    }
     public function getFluxWidth()
    {
        return match((string)$this->size) {
            '1' => 'sm',
            '2' => 'md',    // Default
            '3' => 'lg',
            '4' => 'xl',
            '5' => '2xl',
            '6' => '3xl',
            default => $this->size // Allow passing 'xl' directly
        };
    }
}
