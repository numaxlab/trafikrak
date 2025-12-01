<article class="p-6 {{ $banner->style === 'positive' ? 'bg-secondary text-black' : 'bg-accent text-white' }}">
    <h2 class="at-heading is-2 mb-2">{{ $banner->name }}</h2>

    @if ($banner->description)
        <div class="{{ $banner->style === 'positive' ? 'prose' : 'prose-invert' }}">
            {!! $banner->description !!}
        </div>
    @endif

    @if ($banner->button_text && $banner->link)
        <a href="{{ $banner->link }}" class="at-button is-primary inline-block mt-5">
            {{ $banner->button_text }}
        </a>
    @endif
</article>