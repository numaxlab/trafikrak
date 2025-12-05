<?php

namespace Testa\Admin\Filament\Resources\Content\PageResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Testa\Admin\Filament\Resources\Content\PageResource;
use Testa\Models\Content\Page;

class ManagePageUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = PageResource::class;

    protected static string $model = Page::class;
}
