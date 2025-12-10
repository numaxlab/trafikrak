<article class="container mx-auto px-4">
    <header class="mb-10">
        <h1 class="at-heading is-1">
            {{ __('Actualidad') }}
        </h1>
    </header>

    @if ($activities->isNotEmpty())
        <x-numaxlab-atomic::organisms.tier class="mb-10">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ __('Actividades') }}
                </h2>

                <a href="{{ route('testa.storefront.activities.index') }}"
                   wire:navigate
                   class="at-small"
                >
                    {{ __('ver más') }}
                </a>
            </x-numaxlab-atomic::organisms.tier.header>

            <ul class="grid gap-6 grid-cols-2 md:grid-cols-4">
                @foreach ($activities as $activity)
                    <li>
                        @if ($activity instanceof \Testa\Models\News\Event)
                            <x-testa::events.summary :event="$activity"/>
                        @elseif ($activity instanceof \Testa\Models\Education\CourseModule)
                            <x-testa::course-modules.activity :module="$activity"/>
                        @endif
                    </li>
                @endforeach
            </ul>
        </x-numaxlab-atomic::organisms.tier>
    @endif

    @if ($articles->isNotEmpty())
        <x-numaxlab-atomic::organisms.tier class="mb-10">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ __('Noticias') }}
                </h2>

                <a href="{{ route('testa.storefront.articles.index') }}"
                   wire:navigate
                   class="at-small"
                >
                    {{ __('ver más') }}
                </a>
            </x-numaxlab-atomic::organisms.tier.header>

            <ul class="grid gap-6 grid-cols-2 md:grid-cols-4">
                @foreach ($articles as $article)
                    <li>
                        <x-testa::articles.summary :article="$article"/>
                    </li>
                @endforeach
            </ul>
        </x-numaxlab-atomic::organisms.tier>
    @endif
</article>