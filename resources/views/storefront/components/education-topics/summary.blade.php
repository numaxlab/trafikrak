<x-numaxlab-atomic::molecules.banner
        :href="route('trafikrak.storefront.education.topics.show', $topic->defaultUrl->slug)"
        :class="$topic->getFirstMedia(config('lunar.media.collection')) ? 'has-media' : ''"
        :image-src="$topic->getFirstMedia(config('lunar.media.collection'))?->getUrl('medium')"
>
    <h2 class="at-heading is-3 mb-4">
        {{ $topic->name }}
    </h2>

    <x-slot:content>
        {!! \Illuminate\Support\Str::limit($topic->description, 120) !!}
    </x-slot:content>
</x-numaxlab-atomic::molecules.banner>