<div class="container mx-auto px-4">
    <header>
        <x-numaxlab-atomic::molecules.breadcrumb :label="__('Miga de pan')">
            <li>
                <a href="{{ route('trafikrak.storefront.education.homepage') }}">
                    {{ __('Formación') }}
                </a>
            </li>
        </x-numaxlab-atomic::molecules.breadcrumb>

        <h1 class="at-heading is-1">{{ __('Temas') }}</h1>
    </header>

    <ul class="grid gap-4 md:grid-cols-2 mt-10">
        @for ($i=0; $i<8; $i++)
            <li>
                <x-numaxlab-atomic::molecules.banner
                        :href="route('trafikrak.storefront.education.topics.show', 'slug')">
                    <h2 class="at-heading is-3 mb-4">Tema de formación</h2>

                    <x-slot:content>
                        Breve texto descriptivo del tema.
                    </x-slot:content>
                </x-numaxlab-atomic::molecules.banner>
            </li>
        @endfor
    </ul>
</div>