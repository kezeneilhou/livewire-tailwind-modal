let message ='';

let modalsElement = document.getElementById('livewire-tailwind-modal');

modalsElement.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        Livewire.dispatch('hideModal');
    }
});

document.addEventListener('click', function(event) {
    if (!modalsElement.classList.contains('hidden')) {
        if (event.target.id === 'livewire-tailwind-modal-content') {
            Livewire.dispatch('hideModal');
        }
    }
});

var closeId = document.querySelector('[data-tw="close"]');
        closeId.addEventListener('click', function() {
            Livewire.dispatch('hideModal');
        });

Livewire.on('showModal', (e) => {
   modalsElement.classList.remove('hidden')

});

Livewire.on('hideModal', () => {
    modalsElement.classList.add('hidden')
    Livewire.dispatch('resetModal');
});

document.getElementById('livewire-tailwind-modal-close-btn').addEventListener('click', function() {
    Livewire.dispatch('hideModal');
});