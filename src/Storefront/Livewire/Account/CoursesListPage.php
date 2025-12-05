<?php

namespace Testa\Storefront\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Testa\Livewire\Features\WithPagination;

class CoursesListPage extends Page
{
    use WithPagination;

    public function render(): View
    {
        $courses = Auth::user()
            ->latestCustomer()
            ->courses()
            ->where('is_published', true)
            ->with(['horizontalImage', 'verticalImage'])
            ->paginate(6);

        return view('testa::storefront.livewire.account.courses-list', compact('courses'));
    }
}
