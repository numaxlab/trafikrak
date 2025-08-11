<?php

namespace Trafikrak\Storefront\Livewire\Education;

use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class TopicsListPage extends Page
{
    public function render(): View
    {
        return view('trafikrak::storefront.livewire.education.topics-list');
    }
}
