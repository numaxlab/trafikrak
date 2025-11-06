<div class="container mx-auto px-4">
    <x-numaxlab-atomic::organisms.tier class="mb-10">
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                {{ $tier->name }}
            </h2>

            @if ($tier->has_link)
                <a href="{{ $tier->link }}"
                   wire:navigate
                   class="at-small"
                >
                    {{ $tier->link_name }}
                </a>
            @endif
        </x-numaxlab-atomic::organisms.tier.header>

        <ul class="grid gap-6 md:grid-cols-2">
            @foreach($itineraries as $collection)
                <li>
                    <x-numaxlab-atomic::molecules.banner
                            :image-src="$collection->getFirstMediaUrl(config('lunar.media.collection'), 'medium')"
                            :href="route('trafikrak.storefront.bookshop.itineraries.show', $collection->defaultUrl->slug)">
                        <h2 class="at-heading is-3 mb-4">
                            {{ $collection->translateAttribute('name') }}
                        </h2>

                        @if ($collection->translateAttribute('description'))
                            <x-slot:content>
                                {!! $collection->translateAttribute('description') !!}
                            </x-slot:content>
                        @endif
                    </x-numaxlab-atomic::molecules.banner>
                </li>
            @endforeach
        </ul>
    </x-numaxlab-atomic::organisms.tier>
</div>