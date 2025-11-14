<?php

namespace Trafikrak\Storefront\Livewire\Components\Account;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Trafikrak\Models\Content\Banner;
use Trafikrak\Models\Content\Location;

class Subscription extends Component
{
    public ?Collection $subscriptions;

    public function mount(): void
    {
        $this->subscriptions = auth()->user()->latestCustomer()->activeSubscriptions;
    }

    public function render(): View
    {
        $banner = Banner::whereJsonContains('locations', Location::USER_DASHBOARD_SUBSCRIPTIONS->value)
            ->where('is_published', true)
            ->first();

        return view('trafikrak::storefront.livewire.components.account.subscription', compact('banner'));
    }
}
