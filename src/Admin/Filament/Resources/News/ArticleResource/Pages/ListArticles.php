<?php

namespace Testa\Admin\Filament\Resources\News\ArticleResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Lunar\Admin\Support\Pages\BaseListRecords;
use Testa\Admin\Filament\Resources\News\ArticleResource;

class ListArticles extends BaseListRecords
{
    use Translatable;

    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
