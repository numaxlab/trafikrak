<?php

namespace Trafikrak\Storefront\Livewire\Bookshop;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Lunar\Facades\StorefrontSession;
use Lunar\Models\Collection as LunarCollection;
use Lunar\Models\Product;
use NumaxLab\Lunar\Geslib\Handle;
use NumaxLab\Lunar\Geslib\InterCommands\LanguageCommand;
use NumaxLab\Lunar\Geslib\InterCommands\StatusCommand;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class SearchPage extends Page
{
    #[Url]
    public ?string $q;

    public ?string $taxonQuery;

    public $taxonId;

    public Collection $results;

    public Collection $taxonomies;

    public Collection $languages;

    public Collection $statuses;

    public array $priceRanges = [
        '0-10',
        '10-20',
        '20-30',
        '30-40',
        '40-50',
        '50-1000',
    ];

    public function mount(): void
    {
        $search = trim($this->q);

        if (blank($search)) {
            $this->redirect(route('trafikrak.storefront.bookshop.homepage'));
            return;
        }

        $this->taxonomies = collect();
        $this->languages = LunarCollection::whereHas('group', function ($query) {
            $query->where('handle', LanguageCommand::HANDLE);
        })->channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->get();
        $this->statuses = LunarCollection::whereHas('group', function ($query) {
            $query->where('handle', StatusCommand::HANDLE);
        })->channel(StorefrontSession::getChannel())
            ->customerGroup(StorefrontSession::getCustomerGroups())
            ->get();

        $this->search();
    }

    public function search(): void
    {
        $this->results = Product::search(trim($this->q))
            ->query(fn(Builder $query) => $query->with([
                'variant',
                'variant.taxClass',
                'defaultUrl',
                'urls',
                'thumbnail',
                'authors',
                'prices',
            ]))
            ->get();
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.bookshop.search');
    }

    public function updatedTaxonQuery(): void
    {
        if (empty($this->taxonQuery)) {
            $this->taxonomies = collect();
            return;
        }

        $this->taxonomies = LunarCollection::search($this->taxonQuery)
            ->query(function (Builder $query) {
                $query
                    ->whereHas('group', function ($query) {
                        $query->where('handle', Handle::COLLECTION_GROUP_TAXONOMIES);
                    })->channel(StorefrontSession::getChannel())
                    ->customerGroup(StorefrontSession::getCustomerGroups());
            })->get();
    }
}
