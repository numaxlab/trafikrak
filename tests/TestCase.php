<?php

namespace Testa\Tests;

use Cartalyst\Converter\Laravel\ConverterServiceProvider;
use Filament\FilamentServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Kalnoy\Nestedset\NestedSetServiceProvider;
use Livewire\LivewireServiceProvider;
use Lunar\Admin\LunarPanelProvider;
use Lunar\LunarServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Spatie\Activitylog\ActivitylogServiceProvider;
use Spatie\LaravelBlink\BlinkServiceProvider;
use Spatie\MediaLibrary\MediaLibraryServiceProvider;
use Spatie\Permission\PermissionServiceProvider;
use Testa\TestaServiceProvider;

class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Testa\\Database\\Factories\\'.class_basename($modelName).'Factory',
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LunarServiceProvider::class,
            LunarPanelProvider::class,
            ConverterServiceProvider::class,
            NestedSetServiceProvider::class,
            PermissionServiceProvider::class,
            LivewireServiceProvider::class,
            MediaLibraryServiceProvider::class,
            ActivitylogServiceProvider::class,
            BlinkServiceProvider::class,
            FilamentServiceProvider::class,
            TestaServiceProvider::class,
        ];
    }
}
