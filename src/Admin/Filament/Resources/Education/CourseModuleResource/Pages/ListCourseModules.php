<?php

namespace Testa\Admin\Filament\Resources\Education\CourseModuleResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Lunar\Admin\Support\Pages\BaseListRecords;
use Testa\Admin\Filament\Resources\Education\CourseModuleResource;

class ListCourseModules extends BaseListRecords
{
    use Translatable;

    protected static string $resource = CourseModuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
