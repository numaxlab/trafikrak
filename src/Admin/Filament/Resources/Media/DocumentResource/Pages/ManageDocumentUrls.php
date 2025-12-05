<?php

namespace Testa\Admin\Filament\Resources\Media\DocumentResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Testa\Admin\Filament\Resources\Media\DocumentResource;
use Testa\Models\Media\Document;

class ManageDocumentUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = DocumentResource::class;

    protected static string $model = Document::class;
}
