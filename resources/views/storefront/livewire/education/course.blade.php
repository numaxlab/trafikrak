<article class="container mx-auto px-4">
    <header class="lg:w-8/12">
        <x-numaxlab-atomic::molecules.breadcrumb :label="__('Miga de pan')">
            <li>
                <a href="{{ route('trafikrak.storefront.education.homepage') }}">
                    {{ __('Formación') }}
                </a>
            </li>
            <li>
                <a href="{{ route('trafikrak.storefront.education.courses.index') }}">
                    {{ __('Cursos') }}
                </a>
            </li>
        </x-numaxlab-atomic::molecules.breadcrumb>

        <h1 class="at-heading is-1">Título del curso</h1>

        <h2 class="at-heading is-3 font-normal">Subtítulo</h2>
    </header>
</article>