<?php

namespace Trafikrak\Storefront\Livewire\Editorial;

use Illuminate\View\View;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection;
use NumaxLab\Lunar\Geslib\InterCommands\CollectionCommand;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Trafikrak\Handle;

class HomePage extends Page
{
    public function render(): View
    {
        $featured = Collection::whereHas('group', function ($query) {
            $query->where('handle', Handle::COLLECTION_GROUP_EDITORIAL_FEATURED);
        })->channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->orderBy('_lft', 'ASC')
            ->get();

        $collections = Collection::whereHas('group', function ($query) {
            $query->where('handle', CollectionCommand::HANDLE);
        })->channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->where('attribute_data->in-homepage->value', true)
            ->orderBy('_lft', 'ASC')
            ->with(['defaultUrl'])
            ->get();

        return view('trafikrak::storefront.livewire.editorial.homepage', compact('featured', 'collections'))
            ->title(__('Editorial'));
    }
}
