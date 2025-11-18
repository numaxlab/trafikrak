<?php

namespace Trafikrak\Admin\Filament\Resources\Education\CourseResource\Pages;

use Trafikrak\Admin\Filament\Resources\Education\CourseResource;
use Trafikrak\Admin\Filament\Support\Page\ManageAttachmentsRelatedRecords;

class ManageCourseAttachments extends ManageAttachmentsRelatedRecords
{
    protected static string $resource = CourseResource::class;

    protected static string $relationship = 'attachments';
}
