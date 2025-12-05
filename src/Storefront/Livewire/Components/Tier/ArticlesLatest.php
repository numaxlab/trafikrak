<?php

namespace Testa\Storefront\Livewire\Components\Tier;

use Illuminate\View\View;
use Livewire\Component;
use Testa\Models\Content\Tier;

class ArticlesLatest extends Component
{
    public Tier $tier;

    public function render(): View
    {
        return view('testa::storefront.livewire.components.tier.articles-latest');
    }
}
