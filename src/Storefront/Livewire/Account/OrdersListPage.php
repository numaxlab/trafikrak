<?php

namespace Testa\Storefront\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Testa\Livewire\Features\WithPagination;

class OrdersListPage extends Page
{
    use WithPagination;

    public function render(): View
    {
        $orders = Auth::user()->latestCustomer()->orders()
            ->whereNotIn('status', ['awaiting-payment', 'cancelled'])
            ->where('is_geslib', true)
            ->latest()
            ->paginate(8);

        return view('testa::storefront.livewire.account.orders-list', compact('orders'));
    }
}
