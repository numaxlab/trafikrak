<div>
    @if ($products->isNotEmpty())
        <x-trafikrak::tier.horizontal-scroll>
            <x-slot name="title">
                {{ __('Libros relacionados') }}
            </x-slot>

            <ul class="grid grid-flow-col auto-cols-[40%] md:auto-cols-[25%] gap-6">
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
    @endif
</div>