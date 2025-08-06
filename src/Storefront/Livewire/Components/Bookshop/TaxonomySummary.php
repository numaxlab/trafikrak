<?php

namespace Trafikrak\Storefront\Livewire\Components\Bookshop;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection as LunarCollection;
use Lunar\Models\Product;
use Lunar\Models\ProductType;

class TaxonomySummary extends Component
{
    public LunarCollection $collection;
    public Collection $products;

    public function mount(): void
    {
        $this->products = Product::channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->status('published')
            ->whereHas('productType', function ($query) {
                $query->where((new ProductType)->getTable() . '.id', config('lunar.geslib.product_type_id'));
            })
            ->whereHas('collections', function ($query) {
                $query->whereIn(
                    (new LunarCollection)->getTable() . '.id',
                    array_merge([$this->collection->id], $this->collection->descendants->pluck('id')->toArray()),
                );
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
            ->take(6)
            ->get();
    }

    public function placeholder(): View
    {
        return view('trafikrak::storefront.livewire.components.placeholder.products-tier');
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.bookshop.taxonomy-summary');
    }
}
