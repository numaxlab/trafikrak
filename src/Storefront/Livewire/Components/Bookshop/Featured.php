<?php

namespace Trafikrak\Storefront\Livewire\Components\Bookshop;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection as LunarCollection;
use Lunar\Models\Product;

class Featured extends Component
{
    public LunarCollection $collection;
    public Collection $products;

    public function mount(): void
    {
        $this->products = Product::channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->status('published')
            ->whereHas('productType', function ($query) {
                $query->where('id', config('lunar.geslib.product_type_id'));
            })
            ->whereHas('collections', function ($query) {
                $query->where((new LunarCollection)->getTable() . '.id', $this->collection->id);
            })
            ->with([
                'variant',
                'variant.prices',
                'variant.prices.priceable',
                'variant.prices.priceable.taxClass',
                'variant.prices.priceable.taxClass.taxRateAmounts',
                'variant.prices.currency',
                'media',
                'defaultUrl',
                'authors',
            ])
            ->get();
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.bookshop.featured');
    }
}