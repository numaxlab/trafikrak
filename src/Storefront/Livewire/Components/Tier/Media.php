<?php

namespace Testa\Storefront\Livewire\Components\Tier;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Testa\Models\Content\Tier;
use Testa\Models\Media\Visibility;

class Media extends Component
{
    public Tier $tier;

    public Collection $attachments;

    public function mount(): void
    {
        $this->attachments = $this->tier
            ->attachments()
            ->whereHas('media', function ($query) {
                $query
                    ->where('is_published', true)
                    ->where('visibility', Visibility::PUBLIC->value);
            })
            ->with([
                'media',
            ])
            ->get();
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.components.tier.media');
    }
}
