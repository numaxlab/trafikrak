<?php

namespace Testa\Storefront\GlobalSearch\Mappers;

use Testa\Storefront\GlobalSearch\SearchResult;

class VideoMapper extends AbstractMapper
{
    public function map(): SearchResult
    {
        return new SearchResult(
            $this->model->searchableAs(),
            $this->model->id,
            $this->model->name,
            route('testa.storefront.media.videos.show', $this->model->defaultUrl->slug),
            $this->score,
        );
    }
}
