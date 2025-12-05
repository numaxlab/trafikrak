<?php

namespace Testa\Storefront\Livewire\Components\Bookshop;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Lunar\Models\Contracts\Product;
use Testa\Models\Editorial\Review;

class ProductReviews extends Component
{
    public Product $product;

    public Collection $reviews;

    public function mount(): void
    {
        $this->reviews = Review::where('product_id', $this->product->id)->get();
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.components.bookshop.product-reviews');
    }
}
