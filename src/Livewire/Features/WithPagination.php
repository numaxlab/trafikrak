<?php

namespace Trafikrak\Livewire\Features;

trait WithPagination
{
    use \Livewire\WithPagination;

    public function paginationView(): string
    {
        return 'trafikrak::storefront.partials.paginator';
    }
}
