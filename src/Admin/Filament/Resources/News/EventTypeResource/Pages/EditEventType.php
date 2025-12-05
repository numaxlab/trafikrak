<?php

namespace Testa\Admin\Filament\Resources\News\EventTypeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;
use Lunar\Admin\Support\Pages\BaseEditRecord;
use Testa\Admin\Filament\Resources\News\EventTypeResource;

class EditEventType extends BaseEditRecord
{
    use Translatable;

    protected static string $resource = EventTypeResource::class;

    public static function getNavigationLabel(): string
    {
        return __('testa::event-type.pages.edit.title');
    }

    public function getTitle(): string
    {
        return __('testa::event-type.pages.edit.title');
    }

    protected function getDefaultHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
