<?php

namespace Testa\Storefront\Livewire\Checkout;

use Illuminate\View\View;
use Lunar\Models\Order;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class SuccessPage extends Page
{
    public Order $order;

    public function mount($fingerprint): void
    {
        $this->order = Order::where('fingerprint', $fingerprint)->firstOrFail();
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.checkout.success')
            ->title(__('Pedido finalizado'));
    }
}