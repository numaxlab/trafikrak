<?php

namespace Testa\Admin\Filament\Resources\Education\CourseModuleResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;
use Lunar\Admin\Support\Pages\BaseEditRecord;
use Testa\Admin\Filament\Resources\Education\CourseModuleResource;

class EditCourseModule extends BaseEditRecord
{
    use Translatable;

    protected static string $resource = CourseModuleResource::class;

    public static function getNavigationLabel(): string
    {
        return __('testa::coursemodule.pages.edit.title');
    }

    public function getTitle(): string
    {
        return __('testa::coursemodule.pages.edit.title');
    }

    protected function getDefaultHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
