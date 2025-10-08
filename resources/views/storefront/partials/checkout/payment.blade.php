<x-numaxlab-atomic::organisms.tier class="mt-7">
    <x-numaxlab-atomic::organisms.tier.header>
        <h2 class="at-heading is-2">
            Modo de pago
        </h2>
    </x-numaxlab-atomic::organisms.tier.header>

    @if ($currentStep >= $step)
        <div>
            @foreach ($paymentTypes as $type)
                <x-numaxlab-atomic::atoms.forms.radio
                        name="payment_type"
                        id="paymentType-{{ $type }}"
                        key="paymentType{{ $type }}"
                        value="{{ $type }}">
                    {{ __("trafikrak::global.payment_types.{$type}") }}
                </x-numaxlab-atomic::atoms.forms.radio>
            @endforeach
        </div>
    @endif
</x-numaxlab-atomic::organisms.tier>
