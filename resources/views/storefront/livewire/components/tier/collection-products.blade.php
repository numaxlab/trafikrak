<div class="container mx-auto px-4">
    <x-trafikrak::tier.horizontal-scroll>
        <x-slot name="title">
            {{ $tier->name }}

            @if ($tier->has_link)
                <a href="{{ $tier->link }}"
                   wire:navigate
                   class="at-small"
                >
                    {{ $tier->link_name }}
                </a>
            @endif
        </x-slot>

        <ul class="grid grid-flow-col auto-cols-[35%] md:auto-cols-[20%] xl:auto-cols-[14%] gap-6">
            @foreach ($products as $product)
                <li>
                    <x-trafikrak::products.summary
                            :product="$product"
                            :href="route('trafikrak.storefront.bookshop.products.show', $product->defaultUrl->slug)"
                    />
                </li>
            @endforeach
        </ul>
    </x-trafikrak::tier.horizontal-scroll>
</div>