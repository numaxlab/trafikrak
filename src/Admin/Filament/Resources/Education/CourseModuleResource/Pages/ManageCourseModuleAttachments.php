<?php

namespace Testa\Admin\Filament\Resources\Education\CourseModuleResource\Pages;

use Testa\Admin\Filament\Resources\Education\CourseModuleResource;
use Testa\Admin\Filament\Support\Page\ManageAttachmentsRelatedRecords;

class ManageCourseModuleAttachments extends ManageAttachmentsRelatedRecords
{
    protected static string $resource = CourseModuleResource::class;

    protected static string $relationship = 'attachments';
}
