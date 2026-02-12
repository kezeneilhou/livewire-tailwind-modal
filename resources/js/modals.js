document.addEventListener('alpine:init', () => {
    Alpine.data('globalModal', () => ({
        init() {
            // Listen for the custom window events using JS listeners
            window.addEventListener('open-global-modal', () => {
                Flux.modal('kezeneilhou-global-modal').show();
            });

            window.addEventListener('close-global-modal', () => {
                Flux.modal('kezeneilhou-global-modal').close();
            });
        }
    }));
});