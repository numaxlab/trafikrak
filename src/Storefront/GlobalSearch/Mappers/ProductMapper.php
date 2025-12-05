<?php

namespace Testa\Storefront\GlobalSearch\Mappers;

use Testa\Storefront\GlobalSearch\SearchResult;

class ProductMapper extends AbstractMapper
{
    public function map(): SearchResult
    {
        $title = $this->model->translateAttribute('name');

        if ($this->model->authors->isNotEmpty()) {
            $title .= ' | '.$this->model->authors->pluck('name')->implode(', ');
        }

        return new SearchResult(
            $this->model->searchableAs(),
            $this->model->id,
            $title,
            route('testa.storefront.bookshop.products.show', $this->model->defaultUrl->slug),
            $this->score,
        );
    }
}
