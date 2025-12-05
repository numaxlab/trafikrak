<?php

namespace Testa\Admin\Filament\Resources\Membership\MembershipTierResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;
use Lunar\Admin\Support\Pages\BaseEditRecord;
use Testa\Admin\Filament\Resources\Membership\MembershipTierResource;

class EditMembershipTier extends BaseEditRecord
{
    use Translatable;

    protected static string $resource = MembershipTierResource::class;

    public static function getNavigationLabel(): string
    {
        return __('testa::membership-tier.pages.edit.title');
    }

    public function getTitle(): string
    {
        return __('testa::membership-tier.pages.edit.title');
    }

    protected function getDefaultHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
