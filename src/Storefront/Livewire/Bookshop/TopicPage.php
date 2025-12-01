<?php

namespace Trafikrak\Storefront\Livewire\Bookshop;

use Illuminate\View\View;
use Livewire\Attributes\Url;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection;
use Lunar\Models\Product;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Trafikrak\Livewire\Features\WithPagination;

class TopicPage extends Page
{
    use WithPagination;

    public Collection $topic;

    #[Url]
    public string $q = '';

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

        $this->topic = $this->url->element;
    }

    public function render(): View
    {
        $queryBuilder = Product::channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->status('published')
            ->whereHas('productType', function ($query) {
                $query->where('id', config('lunar.geslib.product_type_id'));
            })
            ->whereHas('collections', function ($query) {
                $query->where(
                    (new Collection)->getTable().'.id',
                    $this->topic->id,
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
            ->withCount('media')
            ->orderByDesc('media_count');

        if ($this->q) {
            $productsByQuery = Product::search($this->q)->get();

            $queryBuilder->whereIn('id', $productsByQuery->pluck('id'));
        }

        $products = $queryBuilder->paginate(18);

        return view('trafikrak::storefront.livewire.bookshop.topic', compact('products'))
            ->title($this->topic->translateAttribute('name'));
    }

    public function search(): void
    {
        $this->resetPage();
    }
}
