<?php

namespace Trafikrak\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Lunar\Base\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class Price extends Model
{
    use HasTranslations;
    use LogsActivity;

    public $translatable = [
        'name',
        'description',
    ];
    protected $guarded = [];

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }
}
