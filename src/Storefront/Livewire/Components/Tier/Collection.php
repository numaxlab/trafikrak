<?php

namespace Trafikrak\Storefront\Livewire\Components\Tier;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\View\View;
use Livewire\Component;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection as LunarCollection;
use Lunar\Models\Product;
use Trafikrak\Models\Content\Tier;

class Collection extends Component
{
    public Tier $tier;

    public EloquentCollection $products;

    public function mount(): void
    {
        $this->products = Product::channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->status('published')
            ->whereHas('productType', function ($query) {
                $query->where('id', config('lunar.geslib.product_type_id'));
            })
            ->whereHas('collections', function ($query) {
                $query->whereIn(
                    (new LunarCollection)->getTable().'.id',
                    $this->tier->collections->pluck('id')->toArray(),
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
            ->get();
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.tier.collection');
    }
}
