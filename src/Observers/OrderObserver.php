<?php

namespace Trafikrak\Observers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Lunar\Models\Customer;
use Lunar\Models\Order;
use Trafikrak\Models\Membership\Benefit;
use Trafikrak\Models\Membership\MembershipPlan;
use Trafikrak\Models\Membership\Subscription;

class OrderObserver
{
    public function updated(Order $order): void
    {
        $validStatuses = ['payment-received', 'dispatched'];

        if ($order->isDirty('status') && in_array($order->status, $validStatuses)) {
            $this->activateSubscriptionFor($order);
        }
    }

    protected function activateSubscriptionFor(Order $order): void
    {
        $customer = $order->user->latestCustomer();

        $existingSubscription = Subscription::where('order_id', $order->id)
            ->where('customer_id', $customer->id)
            ->first();

        if ($existingSubscription) {
            return;
        }

        foreach ($order->lines as $line) {
            if ($line->purchasable_type !== Relation::getMorphAlias(MembershipPlan::class)) {
                continue;
            }

            $membershipPlan = $line->purchasable;

            $customer->subscriptions()->create([
                'membership_plan_id' => $membershipPlan->id,
                'order_id' => $order->id,
                'status' => Subscription::STATUS_ACTIVE,
                'started_at' => now(),
                'expires_at' => now()->addYear(),
            ]);

            $this->applyBenefits($customer, $membershipPlan);
            $this->calculateRecurringPayment($membershipPlan);

            // Envía email, notifica, etc.

            break;
        }
    }

    protected function applyBenefits(Customer $customer, MembershipPlan $membershipPlan): void
    {
        foreach ($membershipPlan->benefits as $benefit) {
            if ($benefit->code === Benefit::CUSTOMER_GROUP) {
                $customer->customerGroups()->attach($benefit->customer_group_id);
            }
        }
    }

    protected function calculateRecurringPayment(MembershipPlan $plan): void
    {
        //
    }
}
