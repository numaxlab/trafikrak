<?php

namespace Testa\Admin\Filament\Resources\Education\CourseModuleResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use Lunar\Admin\Support\Pages\BaseCreateRecord;
use Testa\Admin\Filament\Resources\Education\CourseModuleResource;

class CreateCourseModule extends BaseCreateRecord
{
    use Translatable;

    protected static string $resource = CourseModuleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}