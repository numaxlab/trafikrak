<?php

namespace Trafikrak\Storefront\Livewire\Components\Account;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class FavouriteProducts extends Component
{
    public Collection $latestFavouriteProducts;

    public function mount(): void
    {
        $this->retrieveFavouriteProducts();
    }

    private function retrieveFavouriteProducts(): void
    {
        $this->latestFavouriteProducts = Auth::user()->favourites()->take(3)->get();
    }

    public function removeFromFavourites($productId): void
    {
        Auth::user()->favourites()->detach($productId);

        $this->retrieveFavouriteProducts();
    }

    public function render(): View
    {
        return view('trafikrak::storefront.livewire.components.account.favourite-products');
    }
}
