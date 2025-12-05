<?php

namespace Testa\Storefront\Livewire\Account;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use NumaxLab\Lunar\Geslib\Storefront\Livewire\Page;
use Testa\Livewire\Features\WithPagination;

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

        return view('testa::storefront.livewire.account.favourite-products', compact('favouriteProducts'));
    }
}
