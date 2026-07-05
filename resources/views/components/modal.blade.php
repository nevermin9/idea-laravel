@props(['name', 'title'])

<div
    x-data="{ open: false, name: @js($name) }"
    x-show="open"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs"
    @open-modal.window="$event.detail.id === name && (open = true)"
    @close-modal.window="$event.detail.id === name && (open = false)"
    @keydown.escape.window="open = false"
    x-transition:enter="easy-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-4 -translate-x-4"
    x-transition:enter-end="opacity-100"
    x-transition:leave="easy-in duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 -translate-y-4 -translate-x-4"
    style="display: none;"
    role="dialog"
    aria-modal="true"
>
    <x-card
        class="shadow-xl max-w-2xl w-full max-h-[80dvh] overflow-y-auto"
        @click.outside="open = false"
    >
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-center text-xl font-bold">
                {{ $title }}
            </h2>

            <button
                class="size-6"
                type="button"
                @click="open = false"
            >
                <x-icons.close class="size-6" />
            </button>
        </div>

        <div>
            {{ $slot }}
        </div>
    </x-card>
</div>
