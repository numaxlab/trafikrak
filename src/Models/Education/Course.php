<?php

namespace Trafikrak\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lunar\Base\Traits\HasUrls;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Course extends Model implements HasMedia
{
    use HasUrls;
    use InteractsWithMedia;
    use HasTranslations;

    public $translatable = [
        'title',
        'subtitle',
        'description',
    ];
    protected $casts = [
        'starts_at' => 'date',
        'ends_at' => 'date',
    ];
    protected $guarded = [];

    public function modules(): HasMany
    {
        return $this->hasMany(CourseModule::class);
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class);
    }
}
