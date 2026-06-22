<?php

namespace Kezeneilhou\LaravelLivewireTailwindModals\Components;

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

    public function getFluxMaxWidth(): string
    {
        return match (strtolower(trim((string) ($this->size ?? '2')))) {
            '1', 'sm' => '24rem',
            '2', 'md' => '28rem',
            '3', 'lg' => '32rem',
            '4', 'xl' => '36rem',
            '5', '2xl' => '42rem',
            '6', '3xl' => '48rem',
            '4xl' => '56rem',
            '5xl' => '64rem',
            '6xl' => '72rem',
            '7xl' => '80rem',
            'full' => 'calc(100vw - 2rem)',
            default => '28rem',
        };
    }

    public function getFluxWidthStyle(): string
    {
        $maxWidth = $this->getFluxMaxWidth();

        return "width: min({$maxWidth}, calc(100vw - 2rem)); max-width: calc(100vw - 2rem);";
    }
}
