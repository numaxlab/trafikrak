<div>
    @if ($subscriptions->isNotEmpty())
        <x-numaxlab-atomic::organisms.tier>
            <x-numaxlab-atomic::organisms.tier.header class="flex gap-2">
                <h2 class="at-heading is-2">{{ __('Mis subscripciones') }}</h2>
            </x-numaxlab-atomic::organisms.tier.header>


        </x-numaxlab-atomic::organisms.tier>

        <ul class="divide-y divide-black border-y border-black">
            @foreach ($subscriptions as $subscription)
                <li class="flex justify-between py-2">
                    <span>
                        {{ $subscription->plan->full_name }}
                    </span>
                    <span>
                        {{ __('hasta el :date', ['date' => $subscription->expires_at->format('d/m/Y')]) }}
                    </span>
                </li>
            @endforeach
        </ul>
    @elseif ($banner)
        <x-testa::banners.mini :banner="$banner"/>
    @endif
</div>