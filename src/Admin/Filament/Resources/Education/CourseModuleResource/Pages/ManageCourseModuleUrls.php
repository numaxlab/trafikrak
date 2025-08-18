<?php

namespace Trafikrak\Admin\Filament\Resources\Education\CourseModuleResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Trafikrak\Admin\Filament\Resources\Education\CourseModuleResource;
use Trafikrak\Models\Education\CourseModule;

class ManageCourseModuleUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = CourseModuleResource::class;

    protected static string $model = CourseModule::class;
}
