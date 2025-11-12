<?php

namespace Trafikrak\Storefront\Livewire\Components\Account;

use Illuminate\View\View;
use Livewire\Component;
use Trafikrak\Models\Content\Banner;
use Trafikrak\Models\Content\Location;
use Trafikrak\Models\Membership\Subscription as SubscriptionModel;

class Subscription extends Component
{
    public ?SubscriptionModel $subscription = null;

    public function mount(): void
    {
        $this->subscription = auth()->user()->latestCustomer()->activeSubscription();
    }

    public function render(): View
    {
        $banner = Banner::whereJsonContains('locations', Location::USER_DASHBOARD_SUBSCRIPTIONS->value)
            ->where('is_published', true)
            ->first();

        return view('trafikrak::storefront.livewire.components.account.subscription', compact('banner'));
    }
}
