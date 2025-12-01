<?php

namespace Trafikrak\Storefront\Livewire\Editorial;

use Illuminate\View\View;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection;
use Lunar\Models\Product;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Trafikrak\Livewire\Features\WithPagination;

class SpecialCollectionPage extends Page
{
    use WithPagination;

    public Collection $collection;

    public function mount($slug): void
    {
        $this->fetchUrl(
            slug: $slug,
            type: (new Collection)->getMorphClass(),
            firstOrFail: true,
            eagerLoad: [
                'element.children',
            ],
        );

        $this->collection = $this->url->element;
    }

    public function render(): View
    {
        $products = Product::channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->status('published')
            ->whereHas('productType', function ($query) {
                $query->where('id', config('lunar.geslib.product_type_id'));
            })
            ->whereHas('collections', function ($query) {
                $query->where((new Collection)->getTable().'.id', $this->collection->id);
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
            ->paginate(18);

        return view('trafikrak::storefront.livewire.editorial.special-collection', compact('products'))
            ->title($this->collection->translateAttribute('name'));
    }
}
