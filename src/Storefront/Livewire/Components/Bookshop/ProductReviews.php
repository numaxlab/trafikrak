<?php

namespace Trafikrak\Storefront\Livewire\Components\Bookshop;

use Illuminate\View\View;
use Livewire\Component;
use Lunar\Models\Contracts\Product;

class ProductReviews extends Component
{
    public Product $product;

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.bookshop.product-reviews');
    }
}
