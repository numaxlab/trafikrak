<?php

namespace Testa\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Lunar\Base\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class EventType extends Model
{
    use HasFactory;
    use HasTranslations;
    use LogsActivity;

    public $translatable = [
        'name',
    ];
    protected $guarded = [];

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
