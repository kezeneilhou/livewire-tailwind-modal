let modalsElement = document.getElementById('kezeneilhou-tailwind-modal');
const modal = new Modal(modalsElement);

Livewire.on('showTailwindModal', (e) => {
    modal.show();
});

Livewire.on('hideTailwindModal', (e) => {
    modal.hide();
    Livewire.dispatch('resetModal');
});