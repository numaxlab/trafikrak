<?php

namespace Trafikrak\Storefront\Livewire\Components\Tier;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Trafikrak\Models\Content\Tier;

class Media extends Component
{
    public Tier $tier;

    public Collection $attachments;

    public function mount(): void
    {
        //
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.tier.media');
    }
}
