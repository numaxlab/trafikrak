<div>
    @if ($products->isNotEmpty())
        <x-testa::tier.horizontal-scroll>
            <x-slot name="title">
                {{ __('Libros relacionados') }}
            </x-slot>

            <ul class="grid grid-flow-col auto-cols-[40%] md:auto-cols-[25%] gap-6">
                @foreach ($products as $product)
                    <li>
                        <x-testa::products.summary
                                :product="$product"
                                :href="route('testa.storefront.bookshop.products.show', $product->defaultUrl->slug)"
                        />
                    </li>
                @endforeach
            </ul>
        </x-testa::tier.horizontal-scroll>
    @endif
</div>