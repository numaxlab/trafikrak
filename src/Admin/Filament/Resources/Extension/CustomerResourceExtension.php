<?php

namespace Testa\Admin\Filament\Resources\Extension;

use Lunar\Admin\Support\Extending\ResourceExtension;
use Testa\Admin\Filament\Resources\Sales\CustomerResource\SubscriptionRelationManager;

class CustomerResourceExtension extends ResourceExtension
{
    public function getRelations(array $managers): array
    {
        return [
            ...$managers,
            SubscriptionRelationManager::class,
        ];
    }
}
