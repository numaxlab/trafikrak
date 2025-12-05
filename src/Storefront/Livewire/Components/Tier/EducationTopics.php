<?php

namespace Testa\Storefront\Livewire\Components\Tier;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Testa\Models\Content\Tier;

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
        return view('testa::storefront.livewire.components.tier.education-topics');
    }
}
