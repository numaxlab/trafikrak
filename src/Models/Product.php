<?php

namespace Trafikrak\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Trafikrak\Models\Editorial\Review;
use Trafikrak\Models\Education\Course;

class Product extends \NumaxLab\Lunar\Geslib\Models\Product
{
    public function getTable()
    {
        return config('lunar.database.table_prefix').'products';
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(
            Course::class,
            'course_'.config('lunar.database.table_prefix').'product',
        )->withPivot(['position']);
    }
}
