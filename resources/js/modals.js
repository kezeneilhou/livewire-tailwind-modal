/**
 * Kezeneilhou Global Modal Logic
 * CSP Compliant: No inline scripts, no eval().
 */
document.addEventListener('alpine:init', () => {
    Alpine.data('kezeneilhouGlobalModal', () => ({
        init() {
            // Native Event Listeners (CSP Friendly)
            const openModal = () => {
                if (window.Flux) Flux.modal('kezeneilhou-global-modal').show();
            };
            const closeModal = () => {
                if (window.Flux) Flux.modal('kezeneilhou-global-modal').close();
            };

            window.addEventListener('open-global-modal', openModal);
            window.addEventListener('close-global-modal', closeModal);

            // Cleanup when component is destroyed
            this.$cleanup(() => {
                window.removeEventListener('open-global-modal', openModal);
                window.removeEventListener('close-global-modal', closeModal);
            });
        },

        handleClose() {
            // Dispatch back to Livewire
            this.$wire.dispatch('resetModal');
        }
    }));
});