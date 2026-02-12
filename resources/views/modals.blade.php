<div wire:ignore.self x-data="kezeneilhouGlobalModal">
    <flux:modal 
        name="kezeneilhou-global-modal" 
        class="w-full"
        x-on:close="handleClose"
    >
        @if ($alias)
            @livewire($alias, $params, key($activemodal))
        @endif
    </flux:modal>
</div>