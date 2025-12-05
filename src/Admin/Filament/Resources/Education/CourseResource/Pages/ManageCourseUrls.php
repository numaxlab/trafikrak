<?php

namespace Testa\Admin\Filament\Resources\Education\CourseResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Testa\Admin\Filament\Resources\Education\CourseResource;
use Testa\Models\Education\Course;

class ManageCourseUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = CourseResource::class;

    protected static string $model = Course::class;
}
