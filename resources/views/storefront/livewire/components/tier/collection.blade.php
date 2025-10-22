<div class="container mx-auto px-4">
    <x-numaxlab-atomic::organisms.tier class="mb-10">
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                {{ $tier->name }}
            </h2>

            <a href=""
               wire:navigate
               class="at-small"
            >
                {{ __('Ver máis') }}
            </a>
        </x-numaxlab-atomic::organisms.tier.header>

        <ul class="grid gap-6 grid-cols-2 md:grid-cols-4 lg:grid-cols-6">
            @foreach ($products as $product)
                <li>
                    <x-lunar-geslib::product.summary
                            :product="$product"
                            :href="route('trafikrak.storefront.bookshop.products.show', $product->defaultUrl->slug)"
                    />
                </li>
            @endforeach
        </ul>
    </x-numaxlab-atomic::organisms.tier>
</div>