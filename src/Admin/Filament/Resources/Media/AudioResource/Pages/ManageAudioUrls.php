<?php

namespace Testa\Admin\Filament\Resources\Media\AudioResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Testa\Admin\Filament\Resources\Media\AudioResource;
use Testa\Models\Media\Audio;

class ManageAudioUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = AudioResource::class;

    protected static string $model = Audio::class;
}
