<?php

namespace Trafikrak\Console\Commands;

use Illuminate\Console\Command;
use Lunar\FieldTypes\Toggle;
use Lunar\Models\Attribute;
use Lunar\Models\AttributeGroup;
use Lunar\Models\Brand;

class Install extends Command
{
    protected $signature = 'lunar:trafikrak:install';

    protected $description = 'Install Trafikrak Lunar based features';

    public function handle(): void
    {
        $this->components->info('Setting up attributes.');

        $this->setupBrandAttributes();
    }

    private function setupBrandAttributes(): void
    {
        $group = AttributeGroup::create([
            'attributable_type' => Brand::morphName(),
            'name' => collect([
                'es' => 'Editorial',
            ]),
            'handle' => 'editorial',
            'position' => 2,
        ]);

        Attribute::create([
            'attribute_type' => Brand::morphName(),
            'attribute_group_id' => $group->id,
            'position' => 1,
            'handle' => 'in-house',
            'name' => [
                'es' => 'Mostrar en editorial',
            ],
            'description' => [
                'es' => '',
            ],
            'section' => 'main',
            'type' => Toggle::class,
            'required' => false,
            'default_value' => null,
            'configuration' => [
                'richtext' => false,
            ],
            'system' => false,
            'searchable' => false,
        ]);
    }
}
