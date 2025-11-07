<?php

namespace Trafikrak\Storefront\Livewire\Components\Tier;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Livewire\Component;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection as LunarCollection;
use Lunar\Models\Product;
use NumaxLab\Lunar\Geslib\Handle;
use Trafikrak\Models\Content\Tier;

class Collection extends Component
{
    public Tier $tier;
    public ?EloquentCollection $itineraries;
    public ?EloquentCollection $products;
    private bool $isItineraries = false;

    public function mount(): void
    {
        if ($this->tier->collections->first()->group->handle === Handle::COLLECTION_GROUP_ITINERARIES) {
            $this->isItineraries = true;

            $this->itineraries = LunarCollection::whereIn('id', $this->tier->collections->pluck('id')->toArray())
                ->channel(StorefrontSession::getChannel())
                ->customerGroup(StorefrontSession::getCustomerGroups())
                ->orderBy('_lft', 'ASC')
                ->get();

            return;
        }

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
            ->take(12)
            ->get();
    }

    public function placeholder(): View
    {
        return view('trafikrak::storefront.livewire.components.placeholder.products-tier');
    }

    public function render(): View
    {
        if ($this->isItineraries) {
            return view('trafikrak::storefront.livewire.components.tier.collection-itineraries');
        }

        return view('trafikrak::storefront.livewire.components.tier.collection-products');
    }
}
