<?php

namespace Testa\Storefront\Livewire\Components\Tier;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Testa\Models\Content\Tier;
use Testa\Models\Education\Course;

class EducationUpcoming extends Component
{
    public Tier $tier;

    public Collection $courses;

    public function mount(): void
    {
        $this->courses = Course::where('is_published', true)
            ->where('ends_at', '>=', now())
            ->with([
                'media',
                'defaultUrl',
                'topic',
            ])
            ->orderBy('starts_at', 'asc')
            ->limit(4)
            ->get();
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.components.tier.courses');
    }
}
