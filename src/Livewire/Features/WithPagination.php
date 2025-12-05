<?php

namespace Testa\Livewire\Features;

trait WithPagination
{
    use \Livewire\WithPagination;

    public function paginationView(): string
    {
        return 'testa::storefront.partials.paginator';
    }
}
