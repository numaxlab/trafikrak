<?php

namespace Trafikrak\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Trafikrak\Models\Membership\Benefit;
use Trafikrak\Models\Membership\Subscription;

class Customer extends \Lunar\Models\Customer
{
    public function canBuyOnCredit(): bool
    {
        $activeSubscription = $this->activeSubscription();

        if ($activeSubscription) {
            foreach ($activeSubscription->plan->benefits as $benefit) {
                if ($benefit->code === Benefit::CREDIT_PAYMENT_TYPE) {
                    return true;
                }
            }
        }

        return false;
    }

    public function activeSubscription(): ?Subscription
    {
        return $this
            ->subscriptions()
            ->where('status', Subscription::STATUS_ACTIVE)
            ->where('expires_at', '>=', now())
            ->first();
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
