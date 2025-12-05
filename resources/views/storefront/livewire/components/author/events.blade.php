<div>
    @if ($events->isNotEmpty())
        <x-numaxlab-atomic::organisms.tier class="mb-10">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ __('Eventos relacionados') }}
                </h2>
            </x-numaxlab-atomic::organisms.tier.header>

            <ul class="grid gap-6 grid-cols-2 mb-9 md:grid-cols-4">
                @foreach ($events as $event)
                    <li>
                        <x-testa::course-modules.summary :module="$event"/>
                    </li>
                @endforeach
            </ul>
        </x-numaxlab-atomic::organisms.tier>
    @endif
</div>