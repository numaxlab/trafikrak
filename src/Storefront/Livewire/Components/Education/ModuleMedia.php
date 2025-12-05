<?php

namespace Testa\Storefront\Livewire\Components\Education;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Livewire\Component;
use Testa\Models\Attachment;
use Testa\Models\Education\CourseModule;

class ModuleMedia extends Component
{
    public CourseModule $module;

    public Collection $attachments;

    public function mount(): void
    {
        $this->attachments = Attachment::where('attachable_type', (new CourseModule)->getMorphClass())
            ->where('attachable_id', $this->module->id)
            ->whereHas('media', fn ($query) => $query->where('is_published', true))
            ->with('media')
            ->get()
            ->filter(function ($attachment) {
                return Gate::allows('view', $attachment->media);
            });
    }

    public function render(): View
    {
        return view('testa::storefront.livewire.components.education.module-media');
    }
}
