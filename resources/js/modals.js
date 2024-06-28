let message ='';

let modalsElement = document.getElementById('livewire-tailwind-modal');

modalsElement.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        Livewire.emit('hideModal');
    }
});

Livewire.on('showModal', (e) => {
   modalsElement.classList.remove('hidden')

});

Livewire.on('hideModal', () => {
    modalsElement.classList.add('hidden')
    Livewire.dispatch('resetModal');
});
