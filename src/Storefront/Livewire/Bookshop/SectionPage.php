<?php

namespace Trafikrak\Storefront\Livewire\Bookshop;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection;
use Lunar\Models\Product;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Trafikrak\Livewire\Features\WithPagination;

class SectionPage extends Page
{
    use WithPagination;

    public Collection $section;

    #[Url]
    public string $q = '';

    #[Url]
    public string $t = '';

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

        $this->section = $this->url->element;
    }

    public function render(): View
    {
        $queryBuilder = $this->buildBaseQuery();

        $this->applySearchFilter($queryBuilder);
        $this->applyCollectionFilter($queryBuilder);

        $products = $queryBuilder->paginate(18);

        return view('trafikrak::storefront.livewire.bookshop.section', compact('products'))
            ->title($this->section->translateAttribute('name'));
    }

    protected function buildBaseQuery(): Builder
    {
        return Product::channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->status('published')
            ->whereHas('productType', function ($query) {
                $query->where('id', config('lunar.geslib.product_type_id'));
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
            ->withCount('media')
            ->orderByDesc('media_count');
    }

    protected function applySearchFilter(Builder $query): void
    {
        if (! $this->q) {
            return;
        }

        $productsByQuery = Product::search($this->q)->get();

        if ($productsByQuery->isEmpty()) {
            $query->whereRaw('0 = 1');

            return;
        }

        $query->whereIn('id', $productsByQuery->pluck('id'));
    }

    public function search(): void
    {
        $this->resetPage();
    }

    protected function applyCollectionFilter(Builder $query): void
    {
        if ($this->t) {
            $t = (int) $this->t;

            $query->whereHas('collections', function (Builder $q) use ($t) {
                $collection = Collection::findOrFail($t);

                if ($collection->getDescendantCount() > 0) {
                    $q->whereIn((new Collection)->getTable().'.id', $collection->descendants->pluck('id'));
                } else {
                    $q->where((new Collection)->getTable().'.id', $t);
                }
            });

            return;
        }

        $descendantIds = $this->section->descendants->pluck('id');

        $query->whereHas('collections', function (Builder $q) use ($descendantIds) {
            $q->whereIn((new Collection)->getTable().'.id', $descendantIds);
        });
    }
}
