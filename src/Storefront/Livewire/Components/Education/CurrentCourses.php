<?php

namespace Trafikrak\Storefront\Livewire\Components\Education;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class CurrentCourses extends Component
{
    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.education.current-courses');
    }
}
