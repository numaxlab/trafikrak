<?php

namespace Testa\Admin\Filament\Resources\Education\CourseModuleResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Testa\Admin\Filament\Resources\Education\CourseModuleResource;
use Testa\Models\Education\CourseModule;

class ManageCourseModuleUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = CourseModuleResource::class;

    protected static string $model = CourseModule::class;
}
