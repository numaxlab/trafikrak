<article class="container mx-auto px-4">
    <header>
        <x-numaxlab-atomic::molecules.breadcrumb :label="__('Miga de pan')">
            <li>
                <a href="{{ route('trafikrak.storefront.media.homepage') }}">
                    {{ __('Mediateca') }}
                </a>
            </li>
        </x-numaxlab-atomic::molecules.breadcrumb>

        <h1 class="at-heading is-1">
            {{ __('Documentos') }}
        </h1>

        <form class="my-6 flex flex-col gap-3 md:flex-row md:gap-6" wire:submit.prevent="search">
            <div class="relative w-1/4">
                <x-numaxlab-atomic::atoms.forms.input
                        type="search"
                        wire:model="q"
                        name="q"
                        id="sectionQuery"
                        placeholder="{{ __('Buscar en documentos') }}"
                        aria-label="{{ __('Buscar en documentos') }}"
                        autocomplete="off"
                />
                <button type="submit" aria-label="{{ __('Buscar') }}" class="text-primary absolute inset-y-0 right-3">
                    <i class="icon icon-magnifying-glass" aria-hidden="true"></i>
                </button>
            </div>

            <div class="w-1/4">
                <x-numaxlab-atomic::atoms.forms.select
                        wire:model="c"
                        wire:change="search"
                        name="c"
                        id="course"
                        aria-label="{{ __('Filtrar por curso') }}"
                >
                    <option value="">Todos los cursos</option>
                </x-numaxlab-atomic::atoms.forms.select>
            </div>

            <div class="w-1/4">
                <x-numaxlab-atomic::atoms.forms.select
                        wire:model="t"
                        wire:change="search"
                        name="t"
                        id="topic"
                        aria-label="{{ __('Filtrar por tema') }}"
                >
                    <option value="">Todos los temas</option>
                </x-numaxlab-atomic::atoms.forms.select>
            </div>

            <div class="w-1/4">
                <x-numaxlab-atomic::atoms.forms.select
                        wire:model="d"
                        wire:change="search"
                        name="d"
                        id="date"
                        aria-label="{{ __('Filtrar por fecha') }}"
                >
                    <option value="">Todos las fechas</option>
                </x-numaxlab-atomic::atoms.forms.select>
            </div>
        </form>
    </header>

    <ul class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @for ($i=0; $i<18; $i++)
            <li>
                <x-trafikrak::documents.summary>
                    <x-slot name="thumbnail">
                        <img src="https://picsum.photos/600/800" alt="" loading="lazy">
                    </x-slot>

                    <h2 class="at-heading is-3">
                        Título del documento
                    </h2>

                    <x-slot name="content">
                        <p>Descripción del recurso multimedia.</p>
                    </x-slot>
                </x-trafikrak::documents.summary>
            </li>
        @endfor
    </ul>
</article>