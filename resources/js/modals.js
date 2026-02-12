/**
 * Global Modal Component for Alpine CSP Compliance
 */
document.addEventListener('alpine:init', () => {
    Alpine.data('kezeneilhouGlobalModal', () => ({
        init() {
            // Define handlers as constants so we can remove them on cleanup
            this.openHandler = () => {
                if (window.Flux) {
                    Flux.modal('kezeneilhou-global-modal').show();
                }
            };

            this.closeHandler = () => {
                if (window.Flux) {
                    Flux.modal('kezeneilhou-global-modal').close();
                }
            };

            // Register window listeners
            window.addEventListener('open-global-modal', this.openHandler);
            window.addEventListener('close-global-modal', this.closeHandler);

            // Cleanup to prevent memory leaks in SPAs
            this.$cleanup(() => {
                window.removeEventListener('open-global-modal', this.openHandler);
                window.removeEventListener('close-global-modal', this.closeHandler);
            });
        },

        handleClose() {
            // Triggers the Livewire reset when modal is dismissed
            this.$wire.dispatch('resetModal');
        }
    }));
});