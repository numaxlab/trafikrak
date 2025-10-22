<div>
    <article class="bg-secondary pt-5 pb-90 px-5 mb-10">
        <div class="container mx-auto px-4">
            <h1>Destacado de portada</h1>
        </div>
    </article>

    @foreach ($tiers as $tier)
        <livewire:dynamic-component
                :component="'trafikrak.storefront.livewire.components.tier.' . $tier->livewire_component"
                :lazy="!$loop->first"
                :tier="$tier"
                :key="$tier->id"
        />
    @endforeach
</div>