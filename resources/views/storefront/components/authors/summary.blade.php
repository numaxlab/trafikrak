@props(['author', 'editorial' => false])

<article class="ml-summary">
    <a
            @if ($author->defaultUrl?->slug)
                href="{{ route($editorial ? 'trafikrak.storefront.editorial.authors.show' : 'trafikrak.storefront.authors.show', $author->defaultUrl->slug) }}"
            @endif
            class="flex gap-4"
    >
        <div class="summary-image">
            <img
                    src="{{ $author->getFirstMediaUrl(config('lunar.media.collection'), 'small') }}"
                    alt=""
                    loading="lazy"
                    class="size-30 min-w-30 max-h-30 rounded-full object-cover object-center"
            >
        </div>
        <div class="summary-content">
            <h2 class="at-heading">
                {{ $author->name }}
            </h2>

            @if ($author->translateAttribute('biography'))
                <div class="mt-2 text-black">
                    {!! \Illuminate\Support\Str::limit($author->translateAttribute('biography'), 120) !!}
                </div>
            @endif
        </div>
    </a>
</article>