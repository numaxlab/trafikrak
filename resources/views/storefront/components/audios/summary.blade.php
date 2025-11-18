<article {{ $attributes->merge(['class' => 'ml-summary']) }}>
    <div class="summary-media-wrapper [&>iframe]:aspect-video [&>iframe]:w-full! [&>iframe]:h-auto! [&>div]:hidden">
        {!! $media->source_id !!}
    </div>

    <h2 class="at-heading is-3">
        {{ $media->name }}
    </h2>

    @if ($media->description)
        <div class="summary-content">
            {!! $media->description !!}
        </div>
    @endif
</article>