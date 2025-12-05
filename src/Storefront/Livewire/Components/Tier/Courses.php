<?php

namespace Testa\Storefront\Livewire\Components\Tier;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Testa\Models\Content\Tier;

class Courses extends Component
{
    public Tier $tier;

    public Collection $courses;

    public function mount(): void
    {
        $this->courses = $this->tier
            ->courses()
            ->with([
                'media',
                'defaultUrl',
                'topic',
            ])
            ->orderBy('starts_at', 'asc')
            ->get();
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.components.tier.courses');
    }
}
