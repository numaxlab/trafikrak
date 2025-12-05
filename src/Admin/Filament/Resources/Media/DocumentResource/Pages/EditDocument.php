<?php

namespace Testa\Admin\Filament\Resources\Media\DocumentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;
use Lunar\Admin\Support\Pages\BaseEditRecord;
use Testa\Admin\Filament\Resources\Media\DocumentResource;

class EditDocument extends BaseEditRecord
{
    use Translatable;

    protected static string $resource = DocumentResource::class;

    public static function getNavigationLabel(): string
    {
        return __('testa::document.pages.edit.title');
    }

    public function getTitle(): string
    {
        return __('testa::document.pages.edit.title');
    }

    protected function getDefaultHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
