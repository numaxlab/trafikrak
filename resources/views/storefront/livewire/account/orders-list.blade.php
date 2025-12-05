<x-slot name="bodyClass">bg-secondary</x-slot>

<article class="container mx-auto px-4 lg:max-w-4xl">
    <header class="mb-10">
        <x-numaxlab-atomic::molecules.breadcrumb :label="__('Miga de pan')">
            <li>
                <a href="{{ route('dashboard') }}">
                    {{ __('Mi cuenta') }}
                </a>
            </li>
        </x-numaxlab-atomic::molecules.breadcrumb>

        <h1 class="at-heading is-1">
            {{ __('Mis pedidos') }}
        </h1>
    </header>

    <ul class="grid gap-10 mb-9 md:grid-cols-2">
        @foreach ($orders as $order)
            <li>
                <x-testa::orders.summary :order="$order"/>
            </li>
        @endforeach
    </ul>

    {{ $orders->links() }}
</article>