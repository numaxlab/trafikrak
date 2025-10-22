<article>
    <div class="container mx-auto px-4">
        <h1 class="at-heading is-1 mb-10">{{ __('Librería') }}</h1>
    </div>

    @foreach ($tiers as $tier)
        <livewire:dynamic-component
                :component="'trafikrak.storefront.livewire.components.tier.' . $tier->livewire_component"
                :lazy="!$loop->first"
                :tier="$tier"
                :key="$tier->id"
        />
    @endforeach
</article>