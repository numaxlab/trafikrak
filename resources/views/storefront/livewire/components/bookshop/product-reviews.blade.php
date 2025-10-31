<div>
    <x-numaxlab-atomic::organisms.tier class="mt-10">
        <x-numaxlab-atomic::organisms.tier.header>
            <h2 class="at-heading is-2">
                {{ __('Reseñas') }}
            </h2>
        </x-numaxlab-atomic::organisms.tier.header>

        <ul class="flex flex-col gap-4 md:flex-row md:gap-6">
            @for($i=0; $i<2; $i++)
                <li class="pr-10">
                    <x-trafikrak::reviews.summary/>
                </li>
            @endfor
        </ul>
    </x-numaxlab-atomic::organisms.tier>
</div>