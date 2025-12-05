<?php

namespace Testa\Models\Membership;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Lunar\Base\Traits\LogsActivity;
use Lunar\Models\Customer;
use Lunar\Models\Order;

class Subscription extends Model
{
    use LogsActivity;

    public const string STATUS_ACTIVE = 'active';
    public const string STATUS_CANCELLED = 'cancelled';

    protected $guarded = [];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::modelClass());
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(MembershipPlan::class, 'membership_plan_id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::modelClass());
    }

    protected function casts(): array
    {
        return [
            'started_at' => 'date',
            'expires_at' => 'date',
        ];
    }
}
