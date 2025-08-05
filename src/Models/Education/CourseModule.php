<?php

namespace Trafikrak\Models\Education;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Lunar\Base\Traits\HasUrls;

class CourseModule extends Model
{
    use HasUrls;

    protected $casts = [
        'starts_at' => 'datetime',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
