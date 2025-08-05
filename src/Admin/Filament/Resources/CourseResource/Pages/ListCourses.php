<?php

namespace Trafikrak\Admin\Filament\Resources\CourseResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Trafikrak\Admin\Filament\Resources\CourseResource;

class ListCourses extends ListRecords
{
    protected static string $resource = CourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\CreateAction::make(),
        ];
    }
}