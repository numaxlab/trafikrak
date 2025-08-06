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
        'book' => 'Libros',
        'audio' => 'Audios',
        'video' => 'Vídeos',
        'course' => 'Cursos',
    ];

    public ?string $contentTypeFilter = null;

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
        if (empty($this->query)) {
            $this->results = collect();
            return;
        }

        $this->results = Product::search($this->query)
            ->query(fn(Builder $query) => $query->with([
                'defaultUrl',
                'urls',
                'authors',
            ]))->take(10)->get();
    }

    public function search(): void
    {
        $redirectRoute = null;

        match ($this->contentTypeFilter) {
            'book' => $redirectRoute = 'trafikrak.storefront.bookshop.search',
            'audio', 'video' => $redirectRoute = 'trafikrak.storefront.media.search',
            'course' => $redirectRoute = 'trafikrak.storefront.education.search',
            default => $this->query,
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
