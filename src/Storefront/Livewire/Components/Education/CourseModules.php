<?php

namespace Testa\Storefront\Livewire\Components\Education;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Testa\Models\Education\Course;
use Testa\Models\Education\CourseModule;

class CourseModules extends Component
{
    public Course $course;

    public ?CourseModule $except = null;

    public string $title;
    public Collection $modules;

    public function mount(): void
    {
        $queryBuilder = CourseModule::where('course_id', $this->course->id)
            ->where('is_published', true)
            ->orderBy('starts_at')
            ->with(['defaultUrl', 'course', 'course.defaultUrl']);

        if ($this->except !== null) {
            $queryBuilder->where('id', '!=', $this->except->id);
        }

        $this->modules = $queryBuilder->get();
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.components.education.course-modules');
    }
}