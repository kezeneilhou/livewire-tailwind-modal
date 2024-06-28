let message ='';

let modalsElement = document.getElementById('livewire-tailwind-modal');
// modalsElement.addEventListener('hidePrevented.bs.modal', event => {
//     if (confirm(message)) {
//         let modal = Modal.getInstance(modalsElement);
//         modal.hide();
//     }
// });
// modalsElement.addEventListener('hidden.bs.modal', (e) => {
//     Livewire.dispatch('resetModal');
// });

Livewire.on('showTailwindModal', (e) => {
   modalsElement.classList.remove('hidden')

});

Livewire.on('hideModal', () => {
    modalsElement.classList.add('hidden')
    Livewire.dispatch('resetModal');


});
