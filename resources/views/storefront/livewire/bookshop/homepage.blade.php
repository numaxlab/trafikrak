<article>
    <div class="container mx-auto px-4">
        <h1 class="at-heading is-1 mb-10">{{ __('Librería') }}</h1>
    </div>

    @if ($featuredCollections->isNotEmpty())
        <div class="container mx-auto px-4">
            @foreach ($featuredCollections as $collection)
                <livewire:trafikrak.storefront.livewire.components.bookshop.featured
                        :collection="$collection"
                        :key="$collection->defaultUrl->slug"
                />
            @endforeach
        </div>
    @endif

    @if ($sectionsCollections->isNotEmpty())
        <div class="container mx-auto px-4">
            @foreach($sectionsCollections as $collection)
                <livewire:trafikrak.storefront.livewire.components.bookshop.taxonomy-summary
                        lazy
                        :collection="$collection"
                        :key="$collection->defaultUrl->slug"
                />
            @endforeach
        </div>
    @endif

    <article class="bg-secondary pt-5 pb-50 px-5 mb-10">
        <div class="container mx-auto px-4">
            <h2>Báner 1</h2>
        </div>
    </article>

    <div class="container mx-auto px-4">
        <livewire:trafikrak.storefront.livewire.components.bookshop.featured-itineraries lazy/>
    </div>

    <div class="container mx-auto px-4">
        <article class="bg-secondary pt-5 pb-50 px-5 mb-10">
            <h2>Báner 2</h2>
        </article>
    </div>
</article>