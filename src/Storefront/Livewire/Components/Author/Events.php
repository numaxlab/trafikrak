<?php

namespace Trafikrak\Storefront\Livewire\Components\Author;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use NumaxLab\Lunar\Geslib\Models\Author;
use Trafikrak\Models\Education\CourseModule;

class Events extends Component
{
    public Author $author;

    public Collection $events;

    public function mount(): void
    {
        $authorCourseModules = CourseModule::whereHas('instructors', function ($query) {
            $query->where((new Author)->getTable().'.id', $this->author->id);
        })->where('is_published', true)->get();

        // Events query and merge ordered by date...

        $this->events = $authorCourseModules;
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.author.events');
    }
}
