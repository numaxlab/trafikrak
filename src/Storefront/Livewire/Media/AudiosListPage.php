<?php

namespace Trafikrak\Storefront\Livewire\Media;

use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class AudiosListPage extends Page
{
    public function render(): View
    {
        return view('trafikrak::storefront.livewire.media.audios-list');
    }
}
