<?php

namespace Testa\Storefront\GlobalSearch\Mappers;

use Illuminate\Database\Eloquent\Model;
use Testa\Storefront\GlobalSearch\SearchResult;

abstract class AbstractMapper
{
    public function __construct(protected readonly Model $model, protected readonly float $score) {}

    abstract public function map(): SearchResult;
}
