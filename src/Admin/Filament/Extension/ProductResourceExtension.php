<?php

namespace Testa\Admin\Filament\Extension;

use Lunar\Admin\Support\Extending\ResourceExtension;
use Testa\Admin\Filament\Resources\Editorial\ProductResource\Pages\ManageProductReviews;

class ProductResourceExtension extends ResourceExtension
{
    public function extendPages(array $pages): array
    {
        return [
            ...$pages,
            'reviews' => ManageProductReviews::route('/{record}/reviews'),
        ];
    }

    public function extendSubNavigation(array $nav): array
    {
        return [
            ...$nav,
            ManageProductReviews::class,
        ];
    }
}
