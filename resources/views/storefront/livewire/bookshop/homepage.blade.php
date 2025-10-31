<article>
    @foreach ($slides as $slide)
        <x-trafikrak::slides.full-width :slide="$slide"/>
    @endforeach

    @foreach ($tiers as $tier)
        <livewire:dynamic-component
                :component="'trafikrak.storefront.livewire.components.tier.' . $tier->livewire_component"
                :lazy="!$loop->first"
                :tier="$tier"
                :key="$tier->id"
        />
    @endforeach
</article>