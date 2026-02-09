<div wire:ignore.self>
    '<flux:modal name="kezeneilhou-global-modal" class="min-w-[20rem] space-y-6" :width="$this->getFluxWidth()"
        x-on:open-global-modal.window="Flux.modal('kezeneilhou-global-modal').show()"
        x-on:close-global-modal.window="Flux.modal('kezeneilhou-global-modal').hide()"
        x-on:close="$wire.dispatch('resetModal')">
        <div>
            <flux:heading size="lg">{{ $title }}</flux:heading>
        </div>

        {{-- BODY --}}
        <div class="mt-2">
            @if ($alias)
                @livewire($alias, $params, key($activemodal))
            @endif
        </div>
    </flux:modal>
</div>
