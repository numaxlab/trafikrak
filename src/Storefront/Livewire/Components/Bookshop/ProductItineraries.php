<?php

namespace Testa\Storefront\Livewire\Components\Bookshop;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Contracts\Product;
use NumaxLab\Lunar\Geslib\Handle;

class ProductItineraries extends Component
{
    public Product $product;

    public Collection $itineraries;

    public function mount(): void
    {
        $this->itineraries = \Lunar\Models\Collection::whereHas('group', function ($query) {
            $query->where('handle', Handle::COLLECTION_GROUP_ITINERARIES);
        })->whereHas('products', function ($query) {
            $query->where(
                $this->product->getTable().'.id',
                $this->product->id,
            );
        })->channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->orderBy('_lft', 'ASC')
            ->get();
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.components.bookshop.product-itineraries');
    }
}
