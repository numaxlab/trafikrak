<?php

namespace Testa\Admin\Filament\Resources\Content\TierResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Lunar\Admin\Support\Pages\BaseListRecords;
use Testa\Admin\Filament\Resources\Content\TierResource;
use Testa\Models\Content\Section;

class ListTiers extends BaseListRecords
{
    use Translatable;

    protected static string $resource = TierResource::class;

    public function getDefaultTabs(): array
    {
        return [
            Section::HOMEPAGE->value => Tab::make(__('testa::tier.sections.homepage'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('section', Section::HOMEPAGE->value)),
            Section::BOOKSHOP->value => Tab::make(__('testa::tier.sections.bookshop'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('section', Section::BOOKSHOP->value)),
            Section::EDITORIAL->value => Tab::make(__('testa::tier.sections.editorial'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('section', Section::EDITORIAL->value)),
            Section::EDUCATION->value => Tab::make(__('testa::tier.sections.education'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('section', Section::EDUCATION->value)),
            Section::MEDIA->value => Tab::make(__('testa::tier.sections.media'))
                ->modifyQueryUsing(fn (Builder $query) => $query->where('section', Section::MEDIA->value)),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
