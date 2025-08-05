<?php

namespace Trafikrak\Admin\Filament;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Trafikrak\Admin\Filament\Resources\CourseResource;

class TrafikrakPlugin implements Plugin
{
    public static function get(): static
    {
        return static::make();
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'trafikrak';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            CourseResource::class,
        ]);
    }

    public function boot(Panel $panel): void {}
}
