<div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="livewire-tailwind-modal"
    wire:ignore.self>

    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
            id="livewire-tailwind-modal-content">

            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    @if ($alias)
                        @livewire($alias, $params, $backdrop, $message, key($activemodal))
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
