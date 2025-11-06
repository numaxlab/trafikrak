<article {{ $attributes->merge(['class' => 'ml-summary'])->filter(fn ($value, $key) => ! in_array($key, ['href'])) }}>
    <a href="{{ $attributes->get('href') }}">
        @if (!empty($thumbnail))
            <div class="summary-media-wrapper" href="{{ $attributes->get('href') }}">
                {{ $thumbnail }}
            </div>
        @endif

        {{ $slot }}
    </a>
    @if (!empty($content))
        <div class="summary-content">
            {{ $content }}
        </div>
    @endif
</article>
