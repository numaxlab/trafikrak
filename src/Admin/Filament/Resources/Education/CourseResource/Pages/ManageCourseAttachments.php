<?php

namespace Testa\Admin\Filament\Resources\Education\CourseResource\Pages;

use Testa\Admin\Filament\Resources\Education\CourseResource;
use Testa\Admin\Filament\Support\Page\ManageAttachmentsRelatedRecords;

class ManageCourseAttachments extends ManageAttachmentsRelatedRecords
{
    protected static string $resource = CourseResource::class;

    protected static string $relationship = 'attachments';
}
