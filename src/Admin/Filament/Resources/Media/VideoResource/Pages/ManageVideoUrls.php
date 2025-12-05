<?php

namespace Testa\Admin\Filament\Resources\Media\VideoResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Testa\Admin\Filament\Resources\Media\VideoResource;
use Testa\Models\Media\Video;

class ManageVideoUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = VideoResource::class;

    protected static string $model = Video::class;
}
