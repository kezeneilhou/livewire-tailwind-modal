
<flux:modal 
    name="kezeneilhou-global-modal" 
    class="min-w-[20rem]" 
    :width="$this->getFluxWidth()"
    x-on:close="$wire.dispatch('resetModal')" 
>
    <flux:modal.header>
        <flux:heading size="lg">{{ $title }}</flux:heading>
    </flux:modal.header>

    <flux:modal.body>
        @if ($alias)
            {{-- We keep the key() to force a re-render when the specific modal instance changes --}}
            @livewire($alias, $params, key($activemodal))
        @endif
    </flux:modal.body>
</flux:modal>

{{-- 
    Script to bridge the PHP dispatch to Flux's JS API.
    Flux usually opens via Alpine, so we listen for the browser event dispatched from PHP.
--}}
<script>
    document.addEventListener('livewire:initialized', () => {
        Livewire.on('open-global-modal', () => {
            Flux.modals('kezeneilhou-global-modal').open();
        });
        
        Livewire.on('close-global-modal', () => {
            Flux.modals('kezeneilhou-global-modal').close();
        });
    });
</script>