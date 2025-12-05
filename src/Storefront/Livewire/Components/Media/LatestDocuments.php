<?php

namespace Testa\Storefront\Livewire\Components\Media;

use Illuminate\View\View;
use Livewire\Component;
use Testa\Models\Media\Document;
use Testa\Models\Media\Visibility;

class LatestDocuments extends Component
{
    public function render(): View
    {
        $documents = Document::where('is_published', true)
            ->where('visibility', Visibility::PUBLIC->value)
            ->latest()
            ->take(6)
            ->get();

        return view('testa::storefront.livewire.components.media.latest-documents', compact('documents'));
    }
}
