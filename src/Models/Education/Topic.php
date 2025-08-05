<?php

namespace Trafikrak\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lunar\Base\Traits\HasUrls;

class Topic extends Model
{
    use HasUrls;

    protected $table = 'education_topics';

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
