<?php

namespace Trafikrak\Storefront\Livewire\Components\Education;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Trafikrak\Models\Attachment;
use Trafikrak\Models\Education\Course;

class CourseMedia extends Component
{
    public Course $course;

    public Collection $attachments;

    public function mount(): void
    {
        $this->attachments = Attachment::where('attachable_type', (new Course)->getMorphClass())
            ->where('attachable_id', $this->course->id)
            ->whereHas('media', fn ($query) => $query->where('is_published', true))
            ->with('media')
            ->get();
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.education.course-media');
    }
}
