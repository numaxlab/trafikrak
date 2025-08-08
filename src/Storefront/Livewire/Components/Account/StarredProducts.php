<?php

namespace Trafikrak\Storefront\Livewire\Components\Account;

use Illuminate\View\View;
use Livewire\Component;

class StarredProducts extends Component
{
    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.account.starred-products');
    }
}
