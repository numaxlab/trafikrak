<?php

namespace Testa\Admin\Filament\Resources\Membership\BenefitResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Lunar\Admin\Support\Pages\BaseListRecords;
use Testa\Admin\Filament\Resources\Membership\BenefitResource;

class ListBenefits extends BaseListRecords
{
    use Translatable;

    protected static string $resource = BenefitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
