<x-numaxlab-atomic::organisms.tier class="mb-10">
    <x-numaxlab-atomic::organisms.tier.header>
        <h2 class="at-heading is-2">
            {{ $collection->translateAttribute('name') }}
        </h2>

        <a href="{{ route('testa.storefront.bookshop.sections.show', $collection->defaultUrl->slug) }}"
           wire:navigate
           class="at-small"
        >
            {{ __('Ver más') }}
        </a>
    </x-numaxlab-atomic::organisms.tier.header>

    <ul class="grid gap-6 grid-cols-2 md:grid-cols-4 lg:grid-cols-6">
        @foreach ($products as $product)
            <li>
                <x-testa::products.summary
                        :product="$product"
                        :href="route('testa.storefront.bookshop.products.show', $product->defaultUrl->slug)"
                />
            </li>
        @endforeach
    </ul>
</x-numaxlab-atomic::organisms.tier>