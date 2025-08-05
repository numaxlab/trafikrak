<div>
    <h1>Slider</h1>

    <x-numaxlab-atomic::organisms.tier>
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                Librería
            </h2>

            <a href="{{ route('trafikrak.storefront.bookshop.homepage') }}"
               wire:navigate
               class="at-small"
            >
                {{ __('Ver máis') }}
            </a>
        </x-numaxlab-atomic::organisms.tier.header>

        <ul class="grid gap-6 grid-cols-2 mb-9 md:grid-cols-4 lg:grid-cols-6">
            <li>
                Libros
            </li>
        </ul>
    </x-numaxlab-atomic::organisms.tier>

    <x-numaxlab-atomic::organisms.tier>
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                Editorial
            </h2>

            <a href="{{ route('trafikrak.storefront.editorial.homepage') }}"
               wire:navigate
               class="at-small"
            >
                {{ __('Ver máis') }}
            </a>
        </x-numaxlab-atomic::organisms.tier.header>

        <ul class="grid gap-6 grid-cols-2 mb-9 md:grid-cols-4 lg:grid-cols-6">
            <li>
                Libros
            </li>
        </ul>
    </x-numaxlab-atomic::organisms.tier>

    <h2>Báner 1</h2>

    <h2>Báner 2</h2>

    <x-numaxlab-atomic::organisms.tier>
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                Próximos cursos
            </h2>

            <a href="{{ route('trafikrak.storefront.education.homepage') }}"
               wire:navigate
               class="at-small"
            >
                {{ __('Ver máis') }}
            </a>
        </x-numaxlab-atomic::organisms.tier.header>

        Cursos
    </x-numaxlab-atomic::organisms.tier>

    <x-numaxlab-atomic::organisms.tier>
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                Actividades
            </h2>

            <a href=""
               wire:navigate
               class="at-small"
            >
                {{ __('Ver máis') }}
            </a>
        </x-numaxlab-atomic::organisms.tier.header>

        Actividades
    </x-numaxlab-atomic::organisms.tier>
</div>