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
            {{ __('Audios') }}
        </h1>

        <form class="my-6 flex flex-col gap-3 md:flex-row md:gap-6" wire:submit.prevent="search">
            <div class="relative w-1/4">
                <x-numaxlab-atomic::atoms.forms.input
                        type="search"
                        wire:model="q"
                        name="q"
                        id="sectionQuery"
                        placeholder="{{ __('Buscar en audios') }}"
                        aria-label="{{ __('Buscar en audios') }}"
                        autocomplete="off"
                />
                <button type="submit" aria-label="Buscar" class="text-primary absolute inset-y-0 right-3">
                    <i class="fa-solid fa-search" aria-hidden="true"></i>
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

    <ul class="grid gap-6 md:grid-cols-2 lg:grid-cols-4">
        @for ($i=0; $i<16; $i++)
            <li>
                <x-trafikrak::audios.summary/>
            </li>
        @endfor
    </ul>
</article>