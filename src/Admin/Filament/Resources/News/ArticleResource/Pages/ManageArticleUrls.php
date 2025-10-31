<?php

namespace Trafikrak\Admin\Filament\Resources\News\ArticleResource\Pages;

use Lunar\Admin\Support\Resources\Pages\ManageUrlsRelatedRecords;
use Trafikrak\Admin\Filament\Resources\News\ArticleResource;
use Trafikrak\Models\News\Article;

class ManageArticleUrls extends ManageUrlsRelatedRecords
{
    protected static string $resource = ArticleResource::class;

    protected static string $model = Article::class;
}
