<?php

namespace Trafikrak\Storefront\Livewire\Components\Bookshop;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Product;

class ProductAssociations extends Component
{
    private const int LIMIT = 6;

    public Product $product;

    public Collection $manualAssociations;

    public Collection $automaticAssociations;

    public function mount(): void
    {
        $this->manualAssociations = $this->product->associations;
        $this->automaticAssociations = new Collection;

        if ($this->manualAssociations->isNotEmpty()) {
            return;
        }

        $queryBuilder = Product::channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->status('published')
            ->whereHas('productType', function ($query) {
                $query->where('id', config('lunar.geslib.product_type_id'));
            })
            ->where('id', '!=', $this->product->id)
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
            ]);

        if ($this->product->authors->isNotEmpty()) {
            $authorsQueryBuilder = $queryBuilder->clone();

            $authorsQueryBuilder->whereHas('authors', function ($query) {
                $query->whereIn('id', $this->product->authors->pluck('id'));
            });

            $this->automaticAssociations = $authorsQueryBuilder->take(self::LIMIT)->get();
        }

        if ($this->automaticAssociations->count() < self::LIMIT) {
            $editorialCollectionsQueryBuilder = $queryBuilder->clone();

            $editorialCollectionsQueryBuilder->whereHas('editorialCollections', function ($query) {
                $query->whereIn(
                    (new \Lunar\Models\Collection)->getTable().'.id',
                    $this->product->editorialCollections->pluck('id'),
                );
            });

            $this->automaticAssociations = $editorialCollectionsQueryBuilder
                ->take(self::LIMIT - $this->automaticAssociations->count())
                ->get();
        }

        if ($this->automaticAssociations->count() < self::LIMIT) {
            $taxonomiesQueryBuilder = $queryBuilder->clone();

            $taxonomiesQueryBuilder->whereHas('taxonomies', function ($query) {
                $query->whereIn(
                    (new \Lunar\Models\Collection)->getTable().'.id',
                    $this->product->taxonomies->pluck('id'),
                );
            });

            $this->automaticAssociations = $taxonomiesQueryBuilder
                ->take(self::LIMIT - $this->automaticAssociations->count())
                ->get();
        }
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.bookshop.product-associations');
    }
}
