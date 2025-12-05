<?php

namespace Testa\Storefront\Livewire\Media;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Testa\Models\Media\Video;

class VideoPage extends Page
{
    public Video $video;

    public function mount($slug): void
    {
        $this->fetchUrl(
            slug: $slug,
            type: (new Video)->getMorphClass(),
            firstOrFail: true,
            eagerLoad: [
                'element.attachments',
                'element.attachments.attachable',
            ],
        );

        $this->video = $this->url->element;
    }

    public function render(): View
    {
        if (! Gate::authorize('view', $this->video)) {
            abort(403);
        }

        return view('testa::storefront.livewire.media.video')
            ->title($this->video->name);
    }
}
