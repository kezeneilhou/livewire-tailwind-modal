<div wire:ignore.self>
    <flux:modal name="kezeneilhou-global-modal" class="w-full"
        x-on:open-global-modal.window="Flux.modal('kezeneilhou-global-modal').show()"
        x-on:close-global-modal.window="Flux.modal('kezeneilhou-global-modal').hide()"
        x-on:close="$wire.dispatch('resetModal')">


        @if ($alias)
            @livewire($alias, $params, key($activemodal))
        @endif

    </flux:modal>


</div>
