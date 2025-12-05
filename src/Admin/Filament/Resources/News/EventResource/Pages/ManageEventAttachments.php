<?php

namespace Testa\Admin\Filament\Resources\News\EventResource\Pages;

use Testa\Admin\Filament\Resources\News\EventResource;
use Testa\Admin\Filament\Support\Page\ManageAttachmentsRelatedRecords;

class ManageEventAttachments extends ManageAttachmentsRelatedRecords
{
    protected static string $resource = EventResource::class;

    protected static string $relationship = 'attachments';
}
