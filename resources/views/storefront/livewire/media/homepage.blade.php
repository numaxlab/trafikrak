<div>
    <article class="container mx-auto px-4">
        <h1 class="at-heading is-1 mb-10">{{ __('Mediateca') }}</h1>

        <x-numaxlab-atomic::organisms.tier class="mb-10">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ __('Últimos vídeos') }}
                </h2>

                <a class="at-small">
                    {{ __('Ver más') }}
                </a>
            </x-numaxlab-atomic::organisms.tier.header>

            Vídeos recientes de la mediateca.
        </x-numaxlab-atomic::organisms.tier>

        <x-numaxlab-atomic::organisms.tier class="mb-10">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ __('Últimos audios') }}
                </h2>

                <a class="at-small">
                    {{ __('Ver más') }}
                </a>
            </x-numaxlab-atomic::organisms.tier.header>

            Audios recientes de la mediateca.
        </x-numaxlab-atomic::organisms.tier>

        <x-numaxlab-atomic::organisms.tier class="mb-10">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ __('Últimos documentos') }}
                </h2>

                <a class="at-small">
                    {{ __('Ver más') }}
                </a>
            </x-numaxlab-atomic::organisms.tier.header>

            Documentos recientes de la mediateca.
        </x-numaxlab-atomic::organisms.tier>
    </article>
</div>