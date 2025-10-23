<?php

namespace Trafikrak\Storefront\Livewire\Components\Tier;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Trafikrak\Models\Content\Tier;

class EducationTopics extends Component
{
    public Tier $tier;

    public Collection $topics;

    public function mount(): void
    {
        $this->topics = $this->tier
            ->educationTopics()
            ->with([
                'media',
                'defaultUrl',
            ])
            ->get();
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.tier.education-topics');
    }
}
