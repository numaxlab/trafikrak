<div>
    @if ($associations->isNotEmpty())
        <x-numaxlab-atomic::organisms.tier class="mt-10">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ __('Relacionados') }}
                </h2>
            </x-numaxlab-atomic::organisms.tier.header>

            <ul class="grid gap-6 grid-cols-2 mb-9 md:grid-cols-4">
                @foreach ($associations as $association)
                    <li>
                        <x-trafikrak::products.summary
                                :product="$association->target"
                                :href="route('trafikrak.storefront.bookshop.products.show', $association->target->defaultUrl->slug)"
                        />
                    </li>
                @endforeach
            </ul>
        </x-numaxlab-atomic::organisms.tier>
    @endif
</div>