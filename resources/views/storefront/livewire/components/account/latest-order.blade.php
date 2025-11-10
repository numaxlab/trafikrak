<div>
    <x-numaxlab-atomic::organisms.tier>
        <x-numaxlab-atomic::organisms.tier.header class="flex gap-2">
            <h2 class="at-heading is-2">{{ __('Último pedido') }}</h2>
            @if ($hasMoreOrders)
                <a class="at-small at-button is-secondary" wire:navigate href="{{ route('orders.index') }}">
                    {{ __('Ver todos') }}
                </a>
            @endif
        </x-numaxlab-atomic::organisms.tier.header>

        @if (!$order)
            <p>{{ __('Todavía no has realizado ningún pedido.') }}</p>
        @else
            <x-trafikrak::orders.summary :order="$order"/>
        @endif
    </x-numaxlab-atomic::organisms.tier>
</div>