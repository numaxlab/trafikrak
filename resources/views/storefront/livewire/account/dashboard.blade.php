<article class="container mx-auto px-4 lg:max-w-4xl">
    <div class="grid gap-6 md:grid-cols-2">
        <header>
            <nav>
                <h1 class="at-heading is-1">{{ __('Mi cuenta') }}</h1>

                <ul class="mt-7">
                    <li><strong>{{ $user->full_name }}</strong></li>
                    <li>{{ $user->email }}</li>
                    <li>
                        <ul>
                            <li>
                                <a href="{{ route('settings.profile') }}" wire:navigate>{{ __('Gestionar cuenta') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('settings.password') }}"
                                   wire:navigate>{{ __('Modificar contraseña') }}</a>
                            </li>
                            <li>
                                <a>{{ __('Gestionar subscripciones') }}</a>
                            </li>
                            <li>
                                <form method="post" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-primary">
                                        {{ __('Cerrar sesión') }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

            @if ($defaultAddress)
                <ul class="mt-7">
                    <li><strong>{{ __('Dirección principal') }}</strong></li>
                    <li>
                        <address>
                            {{ $defaultAddress->line_one }}<br>
                            {{ $defaultAddress->postcode }} {{ $defaultAddress->city }}
                        </address>
                        <a href="{{ route('settings.edit-address', $defaultAddress->id) }}" wire:navigate>
                            {{ __('Editar') }}
                        </a>
                    </li>
                </ul>
            @endif
        </header>

        <x-numaxlab-atomic::organisms.tier>
            <x-numaxlab-atomic::organisms.tier.header>
                <h2 class="at-heading is-2">{{ __('Mis aportaciones') }}</h2>
                <a class="at-small">{{ __('Ver todas') }}</a>
            </x-numaxlab-atomic::organisms.tier.header>

            <p>Todavía no eres socia.</p>
        </x-numaxlab-atomic::organisms.tier>

        <livewire:trafikrak.storefront.livewire.components.account.addresses lazy/>

        <livewire:trafikrak.storefront.livewire.components.account.latest-order lazy/>

        <livewire:trafikrak.storefront.livewire.components.account.starred-products lazy/>

        <livewire:trafikrak.storefront.livewire.components.account.latest-course lazy/>
    </div>
</article>