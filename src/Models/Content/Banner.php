<?php

namespace Trafikrak\Models\Content;

use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Lunar\Base\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;
use Trafikrak\Database\Factories\Content\BannerFactory;

class Banner extends Model
{
    use HasFactory;
    use HasTranslations;
    use LogsActivity;

    public $translatable = [
        'name',
        'description',
        'link',
        'button_text',
    ];
    protected $guarded = [];

    protected static function newFactory()
    {
        return BannerFactory::new();
    }

    protected function casts(): array
    {
        return [
            'type' => BannerType::class,
            'locations' => AsEnumCollection::of(Location::class),
        ];
    }
}
