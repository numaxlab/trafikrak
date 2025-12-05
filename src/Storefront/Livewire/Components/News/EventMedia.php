<?php

namespace Testa\Storefront\Livewire\Components\News;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Testa\Models\Attachment;
use Testa\Models\Media\Visibility;
use Testa\Models\News\Event;

class EventMedia extends Component
{
    public Event $event;

    public Collection $attachments;

    public function mount(): void
    {
        $this->attachments = Attachment::where('attachable_type', (new Event)->getMorphClass())
            ->where('attachable_id', $this->event->id)
            ->whereHas(
                'media',
                fn ($query) => $query->where('is_published', true)->where('visibility', Visibility::PUBLIC->value),
            )
            ->with('media')
            ->get();
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.components.news.event-media');
    }
}
