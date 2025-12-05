<?php

namespace Testa\Admin\Filament\Resources\Media\VideoResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;
use Lunar\Admin\Support\Pages\BaseEditRecord;
use Testa\Admin\Filament\Resources\Media\VideoResource;

class EditVideo extends BaseEditRecord
{
    use Translatable;

    protected static string $resource = VideoResource::class;

    public static function getNavigationLabel(): string
    {
        return __('testa::video.pages.edit.title');
    }

    public function getTitle(): string
    {
        return __('testa::video.pages.edit.title');
    }

    protected function getDefaultHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
