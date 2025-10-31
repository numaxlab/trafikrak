<?php

namespace Trafikrak\Storefront\Livewire\Components\Bookshop;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Lunar\Models\Contracts\Product;

class ProductAssociations extends Component
{
    public Product $product;

    public Collection $associations;

    public function mount(): void
    {
        $this->associations = $this->product->associations;
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.bookshop.product-associations');
    }
}
