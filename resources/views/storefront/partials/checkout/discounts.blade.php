<x-numaxlab-atomic::organisms.tier class="mt-7">
    <x-numaxlab-atomic::organisms.tier.header>
        <h2 class="at-heading is-2">
            {{ __('Tienes un cupón?') }}
        </h2>
    </x-numaxlab-atomic::organisms.tier.header>

    <x-numaxlab-atomic::atoms.input
            wire:model.blur="couponCode"
            type="text"
            name="couponCode"
            id="couponCode"
            placeholder="{{ __('Introduce el código') }}"
    >
        {{ __('Introduce el código') }}
    </x-numaxlab-atomic::atoms.input>
</x-numaxlab-atomic::organisms.tier>
