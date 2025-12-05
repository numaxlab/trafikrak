<?php

namespace Testa\Storefront\Livewire\Bookshop;

use Illuminate\View\View;
use Lunar\Models\Collection;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class ItineraryPage extends Page
{
    public Collection $itinerary;

    public function mount($slug): void
    {
        $this->fetchUrl(
            slug: $slug,
            type: (new Collection)->getMorphClass(),
            firstOrFail: true,
            eagerLoad: [
                'element.thumbnail',
                'element.products.variant',
                'element.products.variant.prices',
                'element.products.variant.prices.priceable',
                'element.products.variant.prices.priceable.taxClass',
                'element.products.variant.prices.priceable.taxClass.taxRateAmounts',
                'element.products.variant.prices.currency',
                'element.products.media',
                'element.products.defaultUrl',
                'element.products.authors',
            ],
        );

        $this->itinerary = $this->url->element;
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.bookshop.itinerary')
            ->title($this->itinerary->translateAttribute('name'));
    }
}
