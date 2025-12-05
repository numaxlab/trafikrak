<div class="container mx-auto px-4">
    <x-numaxlab-atomic::organisms.tier class="mb-10">
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                {{ $tier->name }}
            </h2>

            @if ($tier->has_link)
                <a href="{{ $tier->link }}"
                   wire:navigate
                   class="at-small"
                >
                    {{ $tier->link_name }}
                </a>
            @endif
        </x-numaxlab-atomic::organisms.tier.header>

        <ul class="grid gap-6 md:grid-cols-2">
            @foreach($topics as $topic)
                <li>
                    <x-testa::education-topics.summary :topic="$topic"/>
                </li>
            @endforeach
        </ul>
    </x-numaxlab-atomic::organisms.tier>
</div>