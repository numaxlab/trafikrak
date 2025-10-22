<?php

namespace Trafikrak\Models\Content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Lunar\Base\Traits\LogsActivity;
use Lunar\Models\Collection;
use Spatie\Translatable\HasTranslations;

class Tier extends Model
{
    use HasTranslations;
    use LogsActivity;

    public $translatable = [
        'name',
    ];
    protected $casts = [
        'section' => Section::class,
        'type' => TierType::class,
    ];
    protected $guarded = [];

    public function banners(): BelongsToMany
    {
        return $this->belongsToMany(Banner::class);
    }

    public function collections(): BelongsToMany
    {
        $prefix = config('lunar.database.table_prefix');

        return $this->belongsToMany(Collection::modelClass(), "{$prefix}collection_tier");
    }

    public function getLivewireComponentAttribute()
    {
        return match ($this->type) {
            TierType::RELATED_CONTENT_BANNER => 'banner',
            TierType::RELATED_CONTENT_COLLECTION => 'collection',
            TierType::BOOKSHOP_LATEST => 'bookshop-latest',
            TierType::EDITORIAL_LATEST => 'editorial-latest',
            TierType::EDUCATION_UPCOMING => 'education-upcoming',
            TierType::EVENTS_UPCOMING => 'events-upcoming',
            default => null,
        };
    }
}
