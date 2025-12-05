<?php

namespace Testa\Storefront\Livewire\Editorial;

use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Models\Author;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Testa\Livewire\Features\WithPagination;

class AuthorsListPage extends Page
{
    use WithPagination;

    public function render(): View
    {
        $authors = Author::whereHas('products', function ($query) {
            $query->whereHas('brand', function ($query) {
                $query->where('attribute_data->in-house->value', true);
            });
        })
            ->orderBy('name', 'ASC')
            ->with([
                'defaultUrl',
                'media',
            ])
            ->paginate(32);

        return view('testa::storefront.livewire.editorial.authors-list', compact('authors'))
            ->title(__('Autoras'));
    }
}
