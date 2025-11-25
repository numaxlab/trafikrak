<?php

namespace Trafikrak\Storefront\Livewire\Components\Author;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use NumaxLab\Lunar\Geslib\Models\Author;
use Trafikrak\Models\Attachment;
use Trafikrak\Models\Education\CourseModule;
use Trafikrak\Models\Media\Visibility;

class Media extends Component
{
    public Author $author;

    public Collection $attachments;

    public function mount(): void
    {
        $authorCourseModules = CourseModule::whereHas('instructors', function ($query) {
            $query->where((new Author)->getTable().'.id', $this->author->id);
        })->where('is_published', true)->get();

        $this->attachments = Attachment::where('attachable_type', (new CourseModule)->getMorphClass())
            ->whereIn('attachable_id', $authorCourseModules->pluck('id'))
            ->whereHas(
                'media',
                fn ($query) => $query->where('is_published', true)->where('visibility', Visibility::PUBLIC->value),
            )
            ->with('media')
            ->get();
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.author.media');
    }
}
