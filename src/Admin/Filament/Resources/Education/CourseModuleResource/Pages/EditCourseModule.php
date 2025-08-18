<?php

namespace Trafikrak\Admin\Filament\Resources\Education\CourseModuleResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;
use Lunar\Admin\Support\Pages\BaseEditRecord;
use Trafikrak\Admin\Filament\Resources\Education\CourseModuleResource;

class EditCourseModule extends BaseEditRecord
{
    use Translatable;

    protected static string $resource = CourseModuleResource::class;

    public static function getNavigationLabel(): string
    {
        return __('trafikrak::coursemodule.pages.edit.title');
    }

    public function getTitle(): string
    {
        return __('trafikrak::coursemodule.pages.edit.title');
    }

    protected function getDefaultHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
