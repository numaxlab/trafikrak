<x-numaxlab-atomic::organisms.tier>
    <x-numaxlab-atomic::organisms.tier.header class="flex gap-2">
        <h2 class="at-heading is-2">{{ __('Mis direcciones') }}</h2>
        <a href="{{ route('settings.add-address') }}" wire:navigate class="at-small">{{ __('Añadir') }}</a>
    </x-numaxlab-atomic::organisms.tier.header>

    @if ($addresses->isEmpty())
        <p>{{ __('Todavía no tienes direcciones guardadas.') }}</p>
    @else
        <ul class="flex flex-col gap-4 divide-y divide-black">
            @foreach ($addresses as $address)
                <li>
                    <address>
                        {{ $address->line_one }}<br>
                        {{ $address->postcode }} {{ $address->city }}
                    </address>
                    <a href="{{ route('settings.edit-address', $address->id) }}" wire:navigate>
                        {{ __('Editar') }}
                    </a>

                    Eliminar
                </li>
            @endforeach
        </ul>
    @endif
</x-numaxlab-atomic::organisms.tier>