<?php

namespace Testa\Admin\Filament\Resources\Content\SlideResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use Lunar\Admin\Support\Pages\BaseCreateRecord;
use Testa\Admin\Filament\Resources\Content\SlideResource;

class CreateSlide extends BaseCreateRecord
{
    use Translatable;

    protected static string $resource = SlideResource::class;

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
