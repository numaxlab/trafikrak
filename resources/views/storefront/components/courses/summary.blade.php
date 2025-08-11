<x-numaxlab-atomic::molecules.summary href="{{ route('trafikrak.storefront.education.courses.show', 'slug') }}">
    <x-slot name="thumbnail">
        <img src="https://picsum.photos/800/400" alt="">

        <span class="at-tag at-small absolute top-0 left-0 bg-primary border-primary text-white">Tema</span>
    </x-slot>

    <h2 class="at-heading is-3">
        Título del curso
    </h2>
    <h3 class="at-heading is-4 text-black font-normal">
        Subtítulo
    </h3>

    <x-slot name="content">
        <div class="at-small mb-4">
            <p>Un breve texto explicativo del contenido de este curso.</p>
        </div>

        <ul class="text-sm border-y border-black divide-x divide-black flex gap-2 py-2">
            <li class="pr-2">
                <i class="fa-solid fa-calendar text-2xl mr-2" aria-hidden="true"></i>
                00/00/0000 - 00/00/0000
            </li>
            <li>
                Lugar
            </li>
        </ul>
    </x-slot>
</x-numaxlab-atomic::molecules.summary>