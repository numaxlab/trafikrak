<?php

namespace Trafikrak\Storefront\Livewire\Components\Bookshop;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection as LunarCollection;
use NumaxLab\Lunar\Geslib\Handle;

class FeaturedItineraries extends Component
{
    public Collection $itineraries;

    public function mount(): void
    {
        $this->itineraries = LunarCollection::whereHas('group', function ($query) {
            $query->where('handle', Handle::COLLECTION_GROUP_ITINERARIES);
        })->channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->where('attribute_data->in-homepage->value', true)
            ->orderBy('_lft', 'ASC')
            ->get();
    }

    public function placeholder(): View
    {
        return view('trafikrak::storefront.livewire.components.placeholder.itineraries-tier');
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.bookshop.featured-itineraries');
    }
}
