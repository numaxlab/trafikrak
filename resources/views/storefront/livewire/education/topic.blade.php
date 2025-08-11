<article>
    <div class="container mx-auto px-4">
        <header class="md:flex gap-6">
            <div class="md:w-1/2 lg:pr-20">
                <x-numaxlab-atomic::molecules.breadcrumb :label="__('Miga de pan')">
                    <li>
                        <a href="{{ route('trafikrak.storefront.education.homepage') }}">
                            {{ __('Formación') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('trafikrak.storefront.education.topics.index') }}">
                            {{ __('Temas') }}
                        </a>
                    </li>
                </x-numaxlab-atomic::molecules.breadcrumb>

                <h1 class="at-heading is-1">Título del tema</h1>

                <div class="mt-5">
                    Descripción del tema.
                </div>
            </div>

            <figure class="mt-5 md:w-1/2">
                <img src="https://picsum.photos/800/600" alt="">
            </figure>
        </header>

        <x-numaxlab-atomic::organisms.tier class="mt-9">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ __('Cursos') }}
                </h2>
            </x-numaxlab-atomic::organisms.tier.header>

            <ul class="grid gap-6 md:grid-cols-3">
                @for ($i=0; $i<6; $i++)
                    <li>
                        <x-trafikrak::courses.summary/>
                    </li>
                @endfor
            </ul>
        </x-numaxlab-atomic::organisms.tier>
    </div>
</article>