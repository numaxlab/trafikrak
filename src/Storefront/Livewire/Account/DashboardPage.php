<?php

namespace Trafikrak\Storefront\Livewire\Account;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Lunar\Models\Contracts\Address;
use Lunar\Models\Contracts\Customer;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class DashboardPage extends Page
{
    public ?Authenticatable $user;
    public ?Customer $customer;
    public ?Address $defaultAddress;
    public Collection $latestOrders;
    public Collection $addresses;

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->customer = $this->user?->latestCustomer();
        $this->latestOrders = collect();
        $this->addresses = $this->customer->addresses;
        $this->defaultAddress = $this->addresses->where('shipping_default', true)->first();
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.account.dashboard');
    }
}