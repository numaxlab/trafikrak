<?php

namespace Trafikrak\Storefront\Livewire\Education;

use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Trafikrak\Models\Education\CourseModule;

class ModulePage extends Page
{
    public CourseModule $module;

    public function mount($courseSlug, $moduleSlug): void
    {
        $this->fetchUrl(
            slug: $moduleSlug,
            type: (new CourseModule)->getMorphClass(),
            firstOrFail: true,
            eagerLoad: [
                'element.instructors',
                'element.products',
                'element.products.media',
                'element.products.defaultUrl',
                'element.attachments',
                'element.attachments.media',
                'element.course',
                'element.course.defaultUrl',
            ],
        );

        $this->module = $this->url->element;
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.education.module');
    }
}
