<div>
    @if ($modules->isNotEmpty())
        <x-numaxlab-atomic::organisms.tier class="mb-10">
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">
                    {{ $title }}
                </h2>
            </x-numaxlab-atomic::organisms.tier.header>

            <ul class="grid gap-6 md:grid-cols-2">
                @foreach($modules as $module)
                    <li>
                        <x-trafikrak::course-modules.summary :module="$module"/>
                    </li>
                @endforeach
            </ul>
        </x-numaxlab-atomic::organisms.tier>
    @endif
</div>