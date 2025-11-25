<x-numaxlab-atomic::organisms.tier class="mb-10" x-data="horizontalScroll">
    <x-numaxlab-atomic::organisms.tier.header>
        <h2 class="at-heading is-2">
            {{ $title }}
        </h2>

        <ul class="flex gap-4">
            <li>
                <button
                        @mousedown.prevent="startScroll(-50)"
                        @mouseup.prevent="stopScroll()"
                        @mouseleave.prevent="stopScroll()"
                        @touchstart.prevent="startScroll(-50)"
                        @touchend.prevent="stopScroll()"
                        aria-label="{{ __('Mover hacia la izquierda') }}"
                        class="text-primary text-lg"
                >
                    <i class="icon icon-arrow-left" aria-hidden="true"></i>
                </button>
            </li>
            <li>
                <button
                        @mousedown.prevent="startScroll(50)"
                        @mouseup.prevent="stopScroll()"
                        @mouseleave.prevent="stopScroll()"
                        @touchstart.prevent="startScroll(50)"
                        @touchend.prevent="stopScroll()"
                        aria-label="{{ __('Mover hacia la derecha') }}"
                        class="text-primary text-lg"
                >
                    <i class="icon icon-arrow-right" aria-hidden="true"></i>
                </button>
            </li>
        </ul>
    </x-numaxlab-atomic::organisms.tier.header>

    <div class="overflow-x-auto overflow-y-hidden" x-ref="scrollContainer">
        {{ $slot }}
    </div>
</x-numaxlab-atomic::organisms.tier>
