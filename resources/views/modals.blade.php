<div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="livewire-tailwind-modal"
    wire:ignore.self>

    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity backdrop-blur-sm" aria-hidden="true"
        id="modal-bg"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">s
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
            id="livewire-tailwind-modal-content">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-{{ $size }}xl">
                <div class="border border-gray-100 shadow px-4 py-4">
                    <div class="inline font-bold">{{ $title }}</div><button class="float-end"
                        id="livewire-tailwind-modal-close-btn"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path
                                d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                        </svg></button>
                </div>
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    @if ($alias)
                        @livewire($alias, $params, key($activemodal))
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
