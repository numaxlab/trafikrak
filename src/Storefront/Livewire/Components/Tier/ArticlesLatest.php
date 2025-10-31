<?php

namespace Trafikrak\Storefront\Livewire\Components\Tier;

use Illuminate\View\View;
use Livewire\Component;
use Trafikrak\Models\Content\Tier;

class ArticlesLatest extends Component
{
    public Tier $tier;

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.tier.articles-latest');
    }
}
