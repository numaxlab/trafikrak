<?php

namespace Testa\Storefront\Livewire\Education;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Testa\Models\Education\Topic;

class TopicsListPage extends Page
{
    public Collection $topics;

    public function mount(): void
    {
        $this->topics = Topic::where('is_published', true)
            ->with([
                'media',
                'defaultUrl',
            ])
            ->get();
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.education.topics-list');
    }
}
