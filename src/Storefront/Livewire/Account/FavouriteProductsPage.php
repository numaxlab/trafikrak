<?php

namespace Trafikrak\Storefront\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\WithPagination;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;

class FavouriteProductsPage extends Page
{
    use WithPagination;

    public function removeFromFavourites($productId): void
    {
        Auth::user()->favourites()->detach($productId);

        $this->dispatch('$refresh');
    }

    public function render(): View
    {
        $favouriteProducts = Auth::user()->favourites()->paginate(12);

        return view('trafikrak::storefront.livewire.account.favourite-products', compact('favouriteProducts'));
    }
}
