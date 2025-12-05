<?php

namespace Testa\Storefront\Livewire\Bookshop;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection as LunarCollection;
use NumaxLab\Lunar\Geslib\Handle;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class ItinerariesListPage extends Page
{
    public Collection $itineraries;

    public function mount(): void
    {
        $this->itineraries = LunarCollection::whereHas('group', function ($query) {
            $query->where('handle', Handle::COLLECTION_GROUP_ITINERARIES);
        })->channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->orderBy('_lft', 'ASC')
            ->get();
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.bookshop.itineraries-list')
            ->title(__('Itinerarios'));
    }
}
