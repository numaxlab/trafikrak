<?php

namespace Testa\Admin\Filament\Resources\Education\TopicResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Testa\Admin\Filament\Resources\Education\TopicResource;
use Testa\Models\Education\Topic;

class ManageTopicUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = TopicResource::class;

    protected static string $model = Topic::class;
}
