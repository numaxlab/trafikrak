<?php

namespace Trafikrak\Storefront\Livewire\Components\Account;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class Addresses extends Component
{
    public Collection $addresses;

    public function mount(): void
    {
        $this->addresses = Auth::user()?->latestCustomer()->addresses;
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.account.addresses');
    }
}
