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
        $this->size = $data['size'] ?? '2';
        $this->title = $data['title'] ??'Modal';
        $this->activemodal = rand();
        $this->dispatch('showTailwindModal');
    }
    #[On('resetModal')]
    public function resetModal()
    {
        $this->reset();
       
    }
}
