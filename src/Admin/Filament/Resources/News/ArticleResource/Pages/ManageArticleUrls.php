<?php

namespace Testa\Admin\Filament\Resources\News\ArticleResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Testa\Admin\Filament\Resources\News\ArticleResource;
use Testa\Models\News\Article;

class ManageArticleUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = ArticleResource::class;

    protected static string $model = Article::class;
}
