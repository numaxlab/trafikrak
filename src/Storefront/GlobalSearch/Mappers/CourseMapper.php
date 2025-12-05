<?php

namespace Testa\Storefront\GlobalSearch\Mappers;

use Testa\Storefront\GlobalSearch\SearchResult;

class CourseMapper extends AbstractMapper
{
    public function map(): SearchResult
    {
        return new SearchResult(
            $this->model->searchableAs(),
            $this->model->id,
            $this->model->name,
            route('testa.storefront.education.courses.show', $this->model->defaultUrl->slug),
            $this->score,
        );
    }
}
