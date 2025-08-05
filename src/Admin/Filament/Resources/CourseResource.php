<?php

namespace Trafikrak\Admin\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Support\Facades\FilamentIcon;
use Trafikrak\Admin\Filament\Resources\CourseResource\Pages;
use Trafikrak\Models\Education\Course;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    public static function getLabel(): string
    {
        return __('trafikrak::course.label');
    }

    public static function getPluralLabel(): string
    {
        return __('trafikrak::course.plural_label');
    }

    public static function getNavigationIcon(): ?string
    {
        return FilamentIcon::resolve('actions::view-action');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('trafikrak::global.sections.education');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
        ];
    }
}
