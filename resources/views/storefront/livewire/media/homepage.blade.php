<article class="container mx-auto px-4">
    <h1 class="at-heading is-1 mb-10">{{ __('Mediateca') }}</h1>

    <x-numaxlab-atomic::organisms.tier class="mb-10">
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                {{ __('Últimos vídeos') }}
            </h2>

            <a class="at-small" href="{{ route('trafikrak.storefront.media.videos.index') }}">
                {{ __('Ver más') }}
            </a>
        </x-numaxlab-atomic::organisms.tier.header>

        <ul class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            @for ($i=0; $i<4; $i++)
                <li>
                    <x-trafikrak::videos.summary/>
                </li>
            @endfor
        </ul>
    </x-numaxlab-atomic::organisms.tier>

    <x-numaxlab-atomic::organisms.tier class="mb-10">
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                {{ __('Últimos audios') }}
            </h2>

            <a class="at-small" href="{{ route('trafikrak.storefront.media.audios.index') }}">
                {{ __('Ver más') }}
            </a>
        </x-numaxlab-atomic::organisms.tier.header>

        <ul class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            @for ($i=0; $i<4; $i++)
                <li>
                    <x-trafikrak::audios.summary/>
                </li>
            @endfor
        </ul>
    </x-numaxlab-atomic::organisms.tier>

    <x-numaxlab-atomic::organisms.tier class="mb-10">
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                {{ __('Últimos documentos') }}
            </h2>

            <a class="at-small" href="{{ route('trafikrak.storefront.media.documents.index') }}">
                {{ __('Ver más') }}
            </a>
        </x-numaxlab-atomic::organisms.tier.header>

        <ul class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @for ($i=0; $i<6; $i++)
                <li>
                    <x-trafikrak::documents.summary>
                        <x-slot name="thumbnail">
                            <img src="https://picsum.photos/600/800" alt="" loading="lazy">
                        </x-slot>

                        <h2 class="at-heading is-3">
                            Título del documento
                        </h2>

                        <x-slot name="content">
                            <p>Descripción del recurso multimedia.</p>
                        </x-slot>
                    </x-trafikrak::documents.summary>
                </li>
            @endfor
        </ul>
    </x-numaxlab-atomic::organisms.tier>
</article>