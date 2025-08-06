<?php

namespace Trafikrak\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lunar\Base\Traits\HasUrls;
use Spatie\Translatable\HasTranslations;

class Topic extends Model
{
    use HasUrls;
    use HasTranslations;

    public $translatable = [
        'title',
        'subtitle',
        'description',
    ];
    protected $table = 'education_topics';
    protected $guarded = [];

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
