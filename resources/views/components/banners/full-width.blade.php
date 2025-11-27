<article class="relative w-full overflow-hidden bg-secondary mb-9">
    @if ($banner->image)
        <div class="w-full lg:absolute lg:top-0 lg:bottom-0 lg:right-0 lg:w-1/2">
            <img src="{{ Storage::url($banner->image) }}" alt="" class="w-full h-full object-cover">
        </div>
    @endif

    <div class="relative container mx-auto px-4">
        <div class="w-full p-8 lg:w-1/2 lg:py-8 lg:pr-20 lg:pl-0">
            <h2 class="at-heading is-2 mb-2">{{ $banner->name }}</h2>

            @if ($banner->description)
                <div class="mb-4">
                    {!! $banner->description !!}
                </div>
            @endif

            @if ($banner->button_text && $banner->link)
                <a href="{{ $banner->link }}" class="at-button is-primary">
                    {{ $banner->button_text }}
                </a>
            @endif
        </div>
    </div>
</article>
