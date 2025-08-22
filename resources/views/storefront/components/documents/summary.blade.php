<article {{ $attributes->merge(['class' => 'ml-summary flex gap-3 border-b'])->filter(fn ($value, $key) => ! in_array($key, ['href'])) }}>
    <a href="{{ $attributes->get('href') }}" class="w-1/3">
        @if (!empty($thumbnail))
            <div class="summary-media-wrapper" href="{{ $attributes->get('href') }}">
                {{ $thumbnail }}
            </div>
        @endif
    </a>
    <div class="w-2/3 pr-5">
        <a href="{{ $attributes->get('href') }}">
            {{ $slot }}
        </a>

        @if (!empty($content))
            <div class="summary-content">
                {{ $content }}
            </div>
        @endif
    </div>
</article>
