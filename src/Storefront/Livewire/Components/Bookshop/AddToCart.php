<?php

namespace Testa\Storefront\Livewire\Components\Bookshop;

use Illuminate\View\View;

class AddToCart extends \NumaxLab\Lunar\Geslib\Storefront\Livewire\Components\AddToCart
{
    public function render(): View
    {
        return view('testa::storefront.livewire.components.bookshop.add-to-cart');
    }
}
