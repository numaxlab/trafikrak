<?php

namespace Trafikrak\Admin\Filament\Resources\Content\SlideResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Lunar\Admin\Support\Pages\BaseListRecords;
use Trafikrak\Admin\Filament\Resources\Content\SlideResource;
use Trafikrak\Models\Content\Section;

class ListSlides extends BaseListRecords
{
    use Translatable;

    protected static string $resource = SlideResource::class;

    public function getDefaultTabs(): array
    {
        return [
            Section::HOMEPAGE->value => Tab::make(__('trafikrak::slide.form.section.options.homepage'))
                ->modifyQueryUsing(fn(Builder $query) => $query->where('section', Section::HOMEPAGE->value)),
            Section::BOOKSHOP->value => Tab::make(__('trafikrak::slide.form.section.options.bookshop'))
                ->modifyQueryUsing(fn(Builder $query) => $query->where('section', Section::BOOKSHOP->value)),
            Section::EDITORIAL->value => Tab::make(__('trafikrak::slide.form.section.options.editorial'))
                ->modifyQueryUsing(fn(Builder $query) => $query->where('section', Section::EDITORIAL->value)),
            Section::EDUCATION->value => Tab::make(__('trafikrak::slide.form.section.options.education'))
                ->modifyQueryUsing(fn(Builder $query) => $query->where('section', Section::EDUCATION->value)),
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
