<div wire:ignore.self x-data="globalModal">
    <flux:modal name="kezeneilhou-global-modal" class="w-full"
        x-on:close="$wire.dispatch('resetModal')">

        @if ($alias)
            @livewire($alias, $params, key($activemodal))
        @endif

    </flux:modal>
</div>