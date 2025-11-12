<x-slot name="bodyClass">bg-secondary</x-slot>

<article class="container mx-auto px-4 lg:max-w-4xl">
    <header>
        <h1 class="at-heading is-1">{{ __('Asóciate') }}</h1>

        <form wire:submit="signup" class="mt-10">
            <fieldset class="mb-8">
                <legend class="at-heading is-2 float-left w-full">
                    {{ __('¿En qué modalidad te quieres asociar?') }}
                </legend>

                <ul class="grid gap-8 md:grid-cols-2 mt-15 mb-5 clear-both">
                    @foreach ($tiers as $tier)
                        <li wire:key="tier-{{ $tier->id }}">
                            <input type="radio" name="tier" id="tier{{ $tier->id }}" wire:model.live="selectedTier"
                                   value="{{ $tier->id }}">
                            <label class="text-2xl" for="tier{{ $tier->id }}">
                                {{ $tier->name }}
                            </label>
                            @if ($tier->description)
                                <div class="at-small mt-2">
                                    {!! $tier->description !!}
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>

                <x-numaxlab-atomic::atoms.forms.input-error :messages="$errors->get('selectedTier')"/>
            </fieldset>

            @if ($plans->isNotEmpty())
                <fieldset class="mb-8">
                    <legend class="at-heading is-2 float-left w-full">
                        {{ __('Opciones') }}
                    </legend>

                    <ul class="grid gap-8 md:grid-cols-2 mt-15 mb-5 clear-both">
                        @foreach ($plans as $plan)
                            <li wire:key="plan-{{ $plan->id }}">
                                <input type="radio" name="plan" id="plan{{ $plan->id }}" wire:model.live="selectedPlan"
                                       value="{{ $plan->id }}">
                                <label class="text-2xl" for="plan{{ $plan->id }}">
                                    {{ $plan->name }}

                                    (
                                    <livewire:trafikrak.storefront.livewire.components.price
                                            :key="'price-' . $plan->id"
                                            :purchasable="$plan"/>
                                    )
                                </label>
                                @if ($plan->description)
                                    <div class="at-small mt-2">
                                        {!! $plan->description !!}
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>

                    <x-numaxlab-atomic::atoms.forms.input-error :messages="$errors->get('selectedPlan')"/>
                </fieldset>
            @endif

            <fieldset class="mb-8">
                <legend class="at-heading is-2 float-left w-full">
                    {{ __('Tus datos') }}
                </legend>

                <div class="mt-15 clear-both">
                    @include('trafikrak::storefront.partials.signup.user')
                </div>
            </fieldset>

            <fieldset class="mb-8">
                <legend class="at-heading is-2 float-left w-full">
                    {{ __('Método de pago') }}
                </legend>

                <div class="mt-15 clear-both">
                    @include('trafikrak::storefront.partials.signup.payment')
                </div>
            </fieldset>

            <div class="mb-8">
                @include('trafikrak::storefront.partials.privacy-policy')
            </div>

            <button class="at-button is-primary w-full" type="submit">
                {{ __('Asociarme') }}
            </button>
        </form>
    </header>
</article>