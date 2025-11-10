<x-slot name="bodyClass">bg-secondary</x-slot>

<article class="container mx-auto px-4 lg:max-w-4xl">
    <h1 class="at-heading is-1">{{ __('Pedido finalizado') }}</h1>

    <div class="at-lead mt-10 lg:max-w-2/3">
        <p>Muchas gracias por tu pedido. En breves momentos recibirás un correo electrónico con todos los datos. También
            puedes revisarlo en tu cuenta. Si tienes cualquier duda, puedes contactar con nosotros en
            info@libreria.com</p>
    </div>

    <ul class="flex gap-10 mt-10">
        <li>
            <a href="{{ route('dashboard') }}" wire:navigate class="at-button is-primary">
                {{ __('Ver pedido en mi cuenta') }}
            </a>
        </li>
        <li>
            <a href="{{ route('trafikrak.storefront.homepage') }}" wire:navigate class="at-button is-primary">
                {{ __('Ir a la portada') }}
            </a>
        </li>
    </ul>
</article>