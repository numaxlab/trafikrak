<article class="{{ $hasMedia ? '-mb-20' : '' }}">
    <div class="container mx-auto px-4">
        <header class="md:flex gap-6">
            <div class="md:w-1/2 lg:pr-20">
                <h1 class="at-heading is-1">{{ $author->name }}</h1>

                @if ($author->translateAttribute('biography'))
                    <div class="mt-5">
                        {!! $author->translateAttribute('biography') !!}
                    </div>
                @endif
            </div>

            @if ($author->hasMedia(config('lunar.media.collection')))
                <figure class="mt-5 md:w-1/2">
                    <img src="{{ $author->getFirstMediaUrl(config('lunar.media.collection'), 'large') }}"
                         alt="">
                </figure>
            @endif
        </header>

        @if ($products->isNotEmpty())
            <x-numaxlab-atomic::organisms.tier class="mt-10">
                <x-numaxlab-atomic::organisms.tier.header>
                    <h2 class="at-heading is-2">
                        {{ __('Libros') }}
                    </h2>
                </x-numaxlab-atomic::organisms.tier.header>

                <ul class="grid gap-6 grid-cols-2 mb-9 md:grid-cols-4 lg:grid-cols-6">
                    @foreach ($products as $product)
                        <li>
                            <x-trafikrak::products.summary
                                    :product="$product"
                                    :href="route('trafikrak.storefront.bookshop.products.show', $product->defaultUrl->slug)"
                            />
                        </li>
                    @endforeach
                </ul>

                {{ $products->links() }}
            </x-numaxlab-atomic::organisms.tier>
        @endif
    </div>

    @if ($hasMedia)
        <div class="bg-secondary">
            <div class="container mx-auto px-4 py-6">
                <livewire:trafikrak.storefront.livewire.components.author.media
                        lazy
                        :author="$author"
                />

                <livewire:trafikrak.storefront.livewire.components.author.events
                        lazy
                        :author="$author"
                />
            </div>
        </div>
    @endif
</article>