<div class="container mx-auto px-4 mb-9">
    <article class="bg-secondary min-h-90 lg:flex">
        @if ($banner->image)
            <div class="lg:w-1/2">
                <img src="{{ Storage::url($banner->image) }}" alt="" class="w-full h-full object-cover">
            </div>
        @endif
        <div class="p-8 lg:w-1/2 lg:py-8 lg:pr-20 lg:pl-8">
            <h2 class="at-heading is-2 mb-2">{{ $banner->name }}</h2>

            @if ($banner->description)
                <div class="prose">
                    {!! $banner->description !!}
                </div>
            @endif

            @if ($banner->button_text && $banner->link)
                <a href="{{ $banner->link }}" class="at-button is-primary inline-block mt-5">
                    {{ $banner->button_text }}
                </a>
            @endif
        </div>
    </article>
</div>
