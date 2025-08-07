<?php

namespace Trafikrak\Storefront\Livewire\Bookshop;

use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection;
use Lunar\Models\Product;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

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
        $queryBuilder = Product::channel(StorefrontSession::getChannel())
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
            ]);

        if ($this->q) {
            $productsByQuery = Product::search($this->q)->get();

            $queryBuilder->whereIn('id', $productsByQuery->pluck('id'));
        }

        if ($this->t) {
            $queryBuilder->whereHas('collections', function ($query) {
                $query->where(
                    (new Collection)->getTable() . '.id',
                    (int)$this->t,
                );
            });
        } else {
            $queryBuilder->whereHas('collections', function ($query) {
                $query->whereIn(
                    (new Collection)->getTable() . '.id',
                    $this->section->descendants->pluck('id'),
                );
            });
        }

        $products = $queryBuilder->paginate(18);

        return view('trafikrak::storefront.livewire.bookshop.section', compact('products'))
            ->title($this->section->translateAttribute('name'));
    }

    public function search(): void
    {
        $this->resetPage();
    }
}
