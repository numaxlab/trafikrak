<?php

namespace Testa\Models\Membership;

use Illuminate\Database\Eloquent\Model;
use Lunar\Base\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class MembershipTier extends Model
{
    use HasTranslations;
    use LogsActivity;

    public $translatable = [
        'name',
        'description',
    ];
    protected $guarded = [];

    public function plans()
    {
        return $this->hasMany(MembershipPlan::class);
    }
}
