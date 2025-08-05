<div x-data="{ menuExpanded: false, searchExpanded: {{ request()->routeIs('trafikrak.storefront.search') ? 'true' : 'false' }} }">
    <div class="container mx-auto px-4">
        <header class="org-site-header lg:gap-10">
            <a class="text-xl font-bold" href="{{ route('trafikrak.storefront.homepage') }}" wire:navigate>
                {{ config('app.name') }}
            </a>

            <div class="lg:hidden">
                <x-lunar-geslib::header.actions/>
            </div>

            <nav
                    id="site-header-nav"
                    class="site-header-nav lg:flex lg:flex-col-reverse lg:grow"
                    :class="{ 'block': menuExpanded }"
            >
                <div class="lg:flex lg:w-full lg:justify-between">
                    <ul class="site-header-main-menu">
                        <li x-data="{ expanded: false }">
                            <button @click="expanded = !expanded">
                                {{ __('Librería') }}
                            </button>

                            <div x-cloak x-show="expanded">
                                <ul>
                                    <li>
                                        <a href="{{ route('trafikrak.storefront.bookshop.homepage') }}" wire:navigate>
                                            {{ __('Librería') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" wire:navigate>
                                            {{ __('Dónde estamos') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" wire:navigate>
                                            {{ __('Itinerarios') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" wire:navigate>
                                            {{ __('El proyecto') }}
                                        </a>
                                    </li>
                                </ul>

                                <div>
                                    <h3>{{ __('Secciones') }}</h3>

                                    <ul>
                                        <li>
                                            <a href="" wire:navigate>
                                                Sección 1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" wire:navigate>
                                                Sección 2
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li x-data="{ expanded: false }">
                            <button @click="expanded = !expanded">
                                {{ __('Editorial') }}
                            </button>

                            <div x-cloak x-show="expanded">
                                <ul>
                                    <li>
                                        <a href="{{ route('trafikrak.storefront.editorial.homepage') }}" wire:navigate>
                                            {{ __('Editorial') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" wire:navigate>
                                            {{ __('Autoras') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" wire:navigate>
                                            {{ __('Especial (NLR)') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" wire:navigate>
                                            {{ __('El proyecto') }}
                                        </a>
                                    </li>
                                </ul>

                                <div>
                                    <h3>{{ __('Colecciones') }}</h3>

                                    <ul>
                                        <li>
                                            <a href="" wire:navigate>
                                                Colección 1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" wire:navigate>
                                                Colección 2
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>

                        <li x-data="{ expanded: false }">
                            <button @click="expanded = !expanded">
                                {{ __('Formación') }}
                            </button>

                            <ul x-cloak x-show="expanded">
                                <li>
                                    <a href="{{ route('trafikrak.storefront.education.homepage') }}" wire:navigate>
                                        {{ __('Formación') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="" wire:navigate>
                                        {{ __('Temas') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="" wire:navigate>
                                        {{ __('Cursos') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="" wire:navigate>
                                        {{ __('Subscríbete') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="" wire:navigate>
                                        {{ __('Mis cursos') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li x-data="{ expanded: false }">
                            <button @click="expanded = !expanded">
                                {{ __('Mediateca') }}
                            </button>

                            <ul x-cloak x-show="expanded">
                                <li>
                                    <a href="{{ route('trafikrak.storefront.media.homepage') }}" wire:navigate>
                                        {{ __('Mediateca') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="" wire:navigate>
                                        {{ __('Vídeos') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="" wire:navigate>
                                        {{ __('Audios') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="" wire:navigate>
                                        {{ __('Documentos') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="" wire:navigate>
                                {{ __('Actividades') }}
                            </a>
                        </li>
                    </ul>

                    <div class="hidden lg:block lg:relative">
                        <x-lunar-geslib::header.actions/>
                    </div>
                </div>

                <ul class="mb-5">
                    <li><a href="#">Menú de utilidades</a></li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="-mt-10 mb-10 hidden" :class="{ 'hidden': !searchExpanded, 'block': searchExpanded }">
        <livewire:numax-lab.lunar.geslib.storefront.livewire.components.search/>
    </div>
</div>