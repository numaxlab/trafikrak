<div>
    <x-numaxlab-atomic::organisms.tier>
        <x-numaxlab-atomic::organisms.tier.header class="flex gap-2">
            <h2 class="at-heading is-2">{{ __('Mis favoritos') }}</h2>
            @if ($latestFavouriteProducts->isNotEmpty())
                <a class="at-small at-button is-secondary" href="{{ route('favourite-products.index') }}" wire:navigate>
                    {{ __('Ver todos') }}
                </a>
            @endif
        </x-numaxlab-atomic::organisms.tier.header>

        @if ($latestFavouriteProducts->isEmpty())
            <p>{{ __('Todavía no tienes ningún favorito.') }}</p>
            <a href="{{ route('testa.storefront.bookshop.homepage') }}" wire:navigate>
                {{ __('Consulta nuestro catálogo') }}
            </a>
        @else
            <ul class="flex flex-col gap-4 divide-y divide-black">
                @foreach ($latestFavouriteProducts as $product)
                    <li wire:key="favourite-{{ $product->id }}">
                        <a href="{{ route('testa.storefront.bookshop.products.show', $product->defaultUrl->slug) }}">
                            {{ $product->recordTitle }}
                        </a>

                        <button wire:click="removeFromFavourites({{ $product->id }})">
                            {{ __('Eliminar') }}
                        </button>
                    </li>
                @endforeach
            </ul>
        @endif
    </x-numaxlab-atomic::organisms.tier>
</div>