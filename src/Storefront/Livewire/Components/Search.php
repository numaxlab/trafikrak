<?php

namespace Trafikrak\Storefront\Livewire\Components;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Lunar\Models\Product;

class Search extends Component
{
    public ?string $query;

    public array $contentTypes = [
        'all' => 'Mejores resultados',
        'book' => 'Libros',
        'audio' => 'Audios',
        'video' => 'Vídeos',
        'course' => 'Cursos',
    ];

    public ?string $contentTypeFilter = 'all';

    public Collection $results;

    public function mount(): void
    {
        $this->results = collect();
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.search');
    }

    public function setContentTypeFilter($contentType): void
    {
        $this->contentTypeFilter = $contentType;
        $this->updatedQuery();
    }

    public function updatedQuery(): void
    {
        $search = trim($this->query);

        if (blank($search)) {
            $this->results = collect();
            return;
        }

        $this->results = Product::search($search)
            ->query(fn(Builder $query) => $query->with([
                'defaultUrl',
                'urls',
                'authors',
            ]))->take(10)->get();
    }

    public function search(): void
    {
        match ($this->contentTypeFilter) {
            'book' => $redirectRoute = 'trafikrak.storefront.bookshop.search',
            'audio', 'video' => $redirectRoute = 'trafikrak.storefront.media.search',
            'course' => $redirectRoute = 'trafikrak.storefront.education.search',
            default => $redirectRoute = null,
        };

        if ($redirectRoute !== null) {
            $this->redirect(
                route(
                    $redirectRoute,
                    [
                        'q' => $this->query,
                    ],
                ),
                true,
            );
        }
    }
}
