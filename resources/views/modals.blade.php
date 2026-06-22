<div wire:ignore.self x-data="kezeneilhouGlobalModal">
    <div wire:key="kezeneilhou-global-modal-{{ $activemodal ?? 'empty' }}">
        <flux:modal 
            name="kezeneilhou-global-modal" 
            class="w-full"
            style="{{ $this->getFluxWidthStyle() }}"
            x-on:close="handleClose"
        >
            @if ($alias)
                @livewire($alias, $params, key($activemodal))
            @endif
        </flux:modal>
    </div>
</div>
