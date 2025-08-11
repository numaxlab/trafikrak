<div>
    <article class="bg-secondary px-5 pt-10 pb-40 -mt-10 mb-10">
        <div class="container mx-auto px-4">
            <h1 class="at-heading is-1 mb-10">{{ __('Formación') }}</h1>

            <p class="mt-4 md:max-w-[70%] lg:max-w-[50%]">
                Proin pharetra fringilla urna nec porttitor. Suspendisse tempor ut massa fringilla aliquet. Nulla
                pharetra lectus vel turpis hendrerit, ac pharetra mauris venenatis. Cras dictum lobortis dignissim. Orci
                varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
            </p>
        </div>
    </article>

    <div class="container mx-auto px-4">
        <livewire:trafikrak.storefront.livewire.components.education.current-courses/>
    </div>

    <div class="container mx-auto px-4">
        <x-numaxlab-atomic::organisms.tier class="mb-10">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ __('Multimedia') }}
                </h2>
            </x-numaxlab-atomic::organisms.tier.header>

            <ul class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                @for ($i=0; $i<4; $i++)
                    <li>
                        <x-numaxlab-atomic::molecules.summary href="">
                            <x-slot name="thumbnail">
                                <img src="https://picsum.photos/800/600" alt="">
                            </x-slot>

                            <h2 class="at-heading is-3">
                                Título del recurso de mediateca
                            </h2>

                            <x-slot name="content">
                                <p>Descripción del recurso multimedia.</p>
                            </x-slot>
                        </x-numaxlab-atomic::molecules.summary>
                    </li>
                @endfor
            </ul>
        </x-numaxlab-atomic::organisms.tier>
    </div>

    <article class="bg-secondary pt-5 pb-50 px-5 mb-10">
        <div class="container mx-auto px-4">
            <h2>Báner 1</h2>
        </div>
    </article>

    <div class="container mx-auto px-4">
        <x-numaxlab-atomic::organisms.tier class="mb-10">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ __('Autoformación') }}
                </h2>

                <a href="{{ route('trafikrak.storefront.education.courses.index') }}"
                   wire:navigate
                   class="at-small"
                >
                    {{ __('Ver más') }}
                </a>
            </x-numaxlab-atomic::organisms.tier.header>

            <ul class="grid gap-6 md:grid-cols-3">
                @for ($i=0; $i<3; $i++)
                    <li>
                        <x-trafikrak::courses.summary/>
                    </li>
                @endfor
            </ul>
        </x-numaxlab-atomic::organisms.tier>
    </div>

    <div class="container mx-auto px-4">
        <x-numaxlab-atomic::organisms.tier class="mb-10">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ __('Temas') }}
                </h2>

                <a href="{{ route('trafikrak.storefront.education.topics.index') }}"
                   wire:navigate
                   class="at-small"
                >
                    {{ __('Ver más') }}
                </a>
            </x-numaxlab-atomic::organisms.tier.header>

            <ul class="grid gap-4 md:grid-cols-3">
                @for ($i=0; $i<6; $i++)
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
        </x-numaxlab-atomic::organisms.tier>
    </div>
</div>