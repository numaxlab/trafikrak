<div>
    <article class="bg-secondary px-5 pt-10 pb-40 -mt-10 mb-10">
        <div class="container mx-auto px-4">
            <h1 class="at-heading is-1 mb-10">{{ __('Editorial') }}</h1>

            <p class="mt-4 md:max-w-[70%] lg:max-w-[50%]">
                Proin pharetra fringilla urna nec porttitor. Suspendisse tempor ut massa fringilla aliquet. Nulla
                pharetra lectus vel turpis hendrerit, ac pharetra mauris venenatis. Cras dictum lobortis dignissim. Orci
                varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
            </p>
        </div>
    </article>

    @if ($featured->isNotEmpty())
        <div class="container mx-auto px-4">
            @foreach ($featured as $collection)
                <livewire:trafikrak.storefront.livewire.components.bookshop.featured
                        :collection="$collection"
                        :key="$collection->defaultUrl->slug"
                />
            @endforeach
        </div>
    @endif

    <div class="container mx-auto px-4">
        <article class="bg-secondary pt-5 pb-50 px-5 mb-10">
            <h2>Báner 1</h2>
        </article>
    </div>

    @if ($collections->isNotEmpty())
        <div class="container mx-auto px-4">
            @foreach($collections as $collection)
                <livewire:trafikrak.storefront.livewire.components.editorial.collection-summary
                        lazy
                        :collection="$collection"
                        :key="$collection->defaultUrl->slug"
                />
            @endforeach
        </div>
    @endif

    <article class="bg-secondary pt-5 pb-50 px-5 mb-10">
        <div class="container mx-auto px-4">
            <h2>Báner 2</h2>
        </div>
    </article>
</div>