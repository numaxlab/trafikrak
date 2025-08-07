<?php

namespace Trafikrak\Storefront\Views\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection;
use NumaxLab\Lunar\Geslib\Handle;
use NumaxLab\Lunar\Geslib\InterCommands\CollectionCommand;

class Header extends Component
{
    public function __construct() {}

    public function render(): View
    {
        $sections = Collection::whereHas('group', function ($query) {
            $query->where('handle', Handle::COLLECTION_GROUP_TAXONOMIES);
        })->whereNull('parent_id')
            ->where('attribute_data->is-section->value', true)
            ->channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->has('defaultUrl')
            ->orderBy('_lft', 'ASC')
            ->with(['defaultUrl'])->get();

        $editorialCollections = Collection::whereHas('group', function ($query) {
            $query->where('handle', CollectionCommand::HANDLE);
        })->whereNull('parent_id')
            ->where('attribute_data->is-section->value', true)
            ->channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->orderBy('_lft', 'ASC')
            ->get();

        return view('trafikrak::storefront.components.header', compact('sections', 'editorialCollections'))
            ->title(__('Trafikrak'));
    }
}