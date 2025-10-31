<?php

namespace Trafikrak\Storefront\Livewire\Editorial;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Trafikrak\Models\Content\Section;
use Trafikrak\Models\Content\Slide;
use Trafikrak\Models\Content\Tier;

class HomePage extends Page
{
    public Collection $slides;

    public Collection $tiers;

    public function mount(): void
    {
        $this->slides = Slide::where('section', Section::EDITORIAL->value)
            ->where('is_published', true)
            ->orderBy('sort_position')
            ->get();

        $this->tiers = Tier::where('section', Section::EDITORIAL->value)
            ->where('is_published', true)
            ->orderBy('sort_position')
            ->get();
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.editorial.homepage')
            ->title(__('Editorial'));
    }
}
