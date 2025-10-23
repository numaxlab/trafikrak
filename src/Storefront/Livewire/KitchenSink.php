<?php

namespace Trafikrak\Storefront\Livewire;

use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class KitchenSink extends Page
{
    public function render(): View
    {
        return view('trafikrak::storefront.livewire.kitchen-sink');
    }
}
