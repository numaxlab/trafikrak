<?php

namespace Trafikrak\Storefront\Livewire;

use Illuminate\View\View;
use Livewire\WithPagination;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Product;
use NumaxLab\Lunar\Geslib\Models\Author;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class AuthorPage extends Page
{
    use WithPagination;

    public Author $author;

    public function mount($slug): void
    {
        $this->fetchUrl(
            slug: $slug,
            type: (new Author)->getMorphClass(),
            firstOrFail: true,
        );

        $this->author = $this->url->element;
    }

    public function render(): View
    {
        $products = Product::channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->status('published')
            ->whereHas('productType', function ($query) {
                $query->where('id', config('lunar.geslib.product_type_id'));
            })
            ->whereHas('authors', function ($query) {
                $query->where((new Author)->getTable().'.id', $this->author->id);
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
            ->paginate(12);

        return view('trafikrak::storefront.livewire.author', compact('products'))
            ->title($this->author->name);
    }
}
