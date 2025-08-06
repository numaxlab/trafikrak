<?php

namespace Trafikrak\Storefront\Livewire\Bookshop;

use Illuminate\View\View;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection;
use NumaxLab\Lunar\Geslib\Handle;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class HomePage extends Page
{
    public function render(): View
    {
        $featuredCollections = Collection::whereHas('group', function ($query) {
            $query->where('handle', Handle::COLLECTION_GROUP_FEATURED);
        })->channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->orderBy('_lft', 'ASC')
            ->get();

        $sectionsCollections = Collection::whereHas('group', function ($query) {
            $query->where('handle', Handle::COLLECTION_GROUP_TAXONOMIES);
        })->channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->where('attribute_data->in-homepage->value', true)
            ->orderBy('_lft', 'ASC')
            ->with(['defaultUrl'])
            ->get();

        return view(
            'trafikrak::storefront.livewire.bookshop.homepage',
            compact('featuredCollections', 'sectionsCollections'),
        )->title(__('Librería'));
    }
}
