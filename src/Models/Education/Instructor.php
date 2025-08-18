<?php

namespace Trafikrak\Models\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Lunar\Base\Traits\HasMedia;
use Lunar\Base\Traits\HasUrls;
use Lunar\Base\Traits\LogsActivity;
use Lunar\Base\Traits\Searchable;
use Spatie\MediaLibrary\HasMedia as SpatieHasMedia;
use Spatie\Translatable\HasTranslations;
use Trafikrak\Database\Factories\Education\InstructorFactory;

class Instructor extends Model implements SpatieHasMedia
{
    use HasFactory;
    use HasUrls;
    use HasMedia;
    use HasTranslations;
    use LogsActivity;
    use Searchable;

    protected $translatable = [
        'description',
    ];
    protected $guarded = [];

    protected static function newFactory()
    {
        return InstructorFactory::new();
    }

    public function modules(): BelongsToMany
    {
        return $this
            ->belongsToMany(CourseModule::class)
            ->withPivot(['position']);
    }
}
