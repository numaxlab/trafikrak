<article class="container mx-auto px-4">
    <header>
        <x-numaxlab-atomic::molecules.breadcrumb :label="__('Miga de pan')">
            <li>
                <a href="{{ route('trafikrak.storefront.editorial.homepage') }}">
                    {{ __('Editorial') }}
                </a>
            </li>
        </x-numaxlab-atomic::molecules.breadcrumb>

        <h1 class="at-heading is-1 mb-10">{{ __('Autoras') }}</h1>
    </header>

    <ul class="grid gap-6 mb-10 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($authors as $author)
            <li>
                <x-trafikrak::authors.summary :author="$author"/>
            </li>
        @endforeach
    </ul>

    {{ $authors->links() }}
</article>