<?php

namespace Trafikrak\Storefront\Livewire\Media;

use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class HomePage extends Page
{
    public function render(): View
    {
        return view('trafikrak::storefront.livewire.media.homepage');
    }
}
