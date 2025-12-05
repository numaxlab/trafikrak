<?php

namespace Testa\Admin\Filament\Resources\News\EventResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Testa\Admin\Filament\Resources\News\EventResource;
use Testa\Models\News\Event;

class ManageEventUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = EventResource::class;

    protected static string $model = Event::class;
}
