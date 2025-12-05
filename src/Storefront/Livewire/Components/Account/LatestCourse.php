<?php

namespace Testa\Storefront\Livewire\Components\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class LatestCourse extends Component
{
    public function render(): View
    {
        $course = Auth::user()
            ->latestCustomer()
            ->courses()
            ->where('is_published', true)
            ->latest()
            ->first();

        return view('testa::storefront.livewire.components.account.latest-course', compact('course'));
    }
}
