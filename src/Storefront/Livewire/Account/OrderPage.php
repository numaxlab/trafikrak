<?php

namespace Trafikrak\Storefront\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Lunar\Models\Order;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Trafikrak\Livewire\Features\WithPagination;

class OrderPage extends Page
{
    use WithPagination;

    public Order $order;

    public function mount($reference): void
    {
        $this->order = Auth::user()
            ->latestCustomer()
            ->orders()
            ->where('reference', $reference)
            ->whereNotIn('status', ['awaiting-payment', 'cancelled'])
            ->firstOrFail();
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.account.order');
    }
}
