<div>
    @if ($subscription)
        <article>
            <h2 class="at-heading is-3 mb-4">
                {{ __('Eres socia de :plan', ['plan' => $subscription->plan->full_name]) }}
            </h2>
            <p>{{ __('Hasta el :date', ['date' => $subscription->expires_at->format('d/m/Y')]) }}</p>
        </article>
    @elseif ($banner)
        <x-trafikrak::banners.mini :banner="$banner"/>
    @endif
</div>