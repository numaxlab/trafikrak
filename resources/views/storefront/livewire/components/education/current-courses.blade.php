<x-numaxlab-atomic::organisms.tier class="mb-10">
    <x-numaxlab-atomic::organisms.tier.header>
        <h2 class="at-heading is-2">
            {{ __('Cursos') }}
        </h2>

        <a href="{{ route('trafikrak.storefront.education.courses.index') }}"
           wire:navigate
           class="at-small"
        >
            {{ __('Ver más') }}
        </a>
    </x-numaxlab-atomic::organisms.tier.header>

    <ul class="grid gap-6 md:grid-cols-2 lg:grid-cols-6">
        @for ($i=0; $i<5; $i++)
            <li class="{{ $i > 1 ? 'lg:col-span-2' : 'lg:col-span-3' }}">
                <x-trafikrak::courses.summary/>
            </li>
        @endfor
    </ul>
</x-numaxlab-atomic::organisms.tier>