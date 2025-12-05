<?php

namespace Testa\Storefront\Livewire\Account;

use Illuminate\Contracts\Auth\Authenticatable;
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

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->customer = $this->user?->latestCustomer();
        $this->defaultAddress = $this->customer->addresses->where('shipping_default', true)->first();
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.account.dashboard');
    }
}