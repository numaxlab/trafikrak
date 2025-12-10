# Testa

[![Latest Version on Packagist](https://img.shields.io/packagist/v/numaxlab/testa.svg?style=flat-square)](https://packagist.org/packages/numaxlab/testa)
[![Total Downloads](https://img.shields.io/packagist/dt/numaxlab/testa.svg?style=flat-square)](https://packagist.org/packages/numaxlab/testa)

Testa is a Galician term used in printing and binding referring to the top edge of a book.

It is also a comprehensive Laravel package that extends the [Lunar](https://lunarphp.io/) e-commerce platform. Testa
offers an opinionated, feature-rich solution specifically designed for building advanced, content-driven online stores
for bookshops.

This package is tailored for bookshops that utilize [Geslib](https://editorial.trevenque.es/productos/geslib/) as their
primary management system. It relies on the [numaxlab/lunar-geslib](https://github.com/numaxlab/lunar-geslib) package
for the core Geslib integration and complements it by providing a ready-to-use storefront implementation.

Furthermore, Testa expands Lunar's capabilities by integrating a full-featured educational platform, a
membership system, news and events management, and other key tools.

Testa was designed in a collaboration
between [Traficantes de Sueños](https://traficantes.net), [Katakrak](https://katakrak.net)
and [NUMAX](https://numax.org).

## Features

- **Content Management**: Create and manage static pages, promotional banners, and image slides.
- **Education Platform**:
    - Manage courses, modules, and topics.
    - Dedicated "Course" product type in Lunar.
- **Media Library**:
    - Upload and manage Audio, Video, and Document files.
    - Control media visibility (e.g., public, members-only).
- **Membership System**:
    - Define membership tiers and plans.
    - Manage subscriptions and member-exclusive benefits.
- **News & Events**:
    - Publish articles.
    - Create and manage events with types and venues.
- **Editorial Area**: Manage reviews and special "editorial" collections.
- **Donation System**: Includes a pre-configured, flexible "Donation" product type.
- **Lunar & Filament Integration**:
    - Extends core Lunar models like `Product` and `Customer`.
    - Extends the Filament admin panel for `Product` and `Customer` resources.
- Provides a rich set of Livewire and Blade components for the storefront.

## Requirements

- PHP ^8.4
- Laravel 12
- [LunarPHP](https://lunarphp.io/docs/core/index.html)
- [Lunar Geslib](https://github.com/numaxlab/lunar-geslib)

## Installation

After following the official Laravel [installation instructions](https://laravel.com/docs/installation) to create a
new project, you can install this package via Composer:

```bash
composer require numaxlab/testa
```

The package service provider will be auto-discovered by Laravel.

1. **Add the Filament Plugins to the Lunar Panel in the register method of your `AppServiceProvider`**
   ```php
   LunarPanel::panel(function ($panel) {
        return $panel
            ->plugins([
                GeslibPlugin::make(),
                TestaPlugin::make(),
                ShippingPlugin::make(),
                SpatieLaravelTranslatablePlugin::make()
                    ->defaultLocales(['es', 'en']), // Setup the languages you want to use
            ]);
   })->register();
   ```

2. **Run the Installer Commands**

   This is a **crucial step**. The installer commands will set up required Lunar attributes, collection groups, tags,
   and
   seed initial data needed for the package to function correctly.

   ```bash
   php artisan lunar:geslib:install
   php artisan lunar:testa:install
   ```

3. **Setup the User model**

    ```php
    use Lunar\Base\Traits\LunarUser;
    use Lunar\Base\LunarUser as LunarUserInterface;
    use NumaxLab\Lunar\Geslib\Traits\LunarGeslibUser;
    // ...
    
    class User extends Authenticatable implements LunarUserInterface
    {
        use LunarUser;
        use LunarGeslibUser;
        // ...
    }
    ```

4. **Setup the testa livewire layout**

    ```php
    // config/livewire.php
    // ...
    'layout' => 'testa::components.layouts.app',
    // ...
    ```

5. **Setup the searchable models**

    ```php
    // config/lunar/search.php
    // ...
    'models' => [
        // ...
        \NumaxLab\Testa\Models\Page::class,
        \NumaxLab\Testa\Models\Course::class,
        \NumaxLab\Testa\Models\Article::class,
    ]
    // ...
    'indexers' => [
        // ...
        // Lunar\Models\Product::class => Lunar\Search\ProductIndexer::class, Replace the default Lunar product indexer
        Lunar\Models\Product::class => NumaxLab\Lunar\Geslib\Search\ProductIndexer::class,
        NumaxLab\Lunar\Geslib\Models\Author::class => NumaxLab\Lunar\Geslib\Search\AuthorIndexer::class,
    ]
    ```

6. **Setup media definitions**

   ```php
    // config/lunar/media.php
    // use Lunar\Base\StandardMediaDefinitions; Replace the default media definitions
    use NumaxLab\Lunar\Geslib\Media\ProductMediaDefinitions;
    use Testa\Media\StandardMediaDefinitions;

    return [
        'definitions' => [
            // ...
            // 'product' => StandardMediaDefinitions::class, Replace the default media definitions for products
            'product' => ProductMediaDefinitions::class,
            // ...
            'author' => StandardMediaDefinitions::class,
            'education-topic' => StandardMediaDefinitions::class,
            'course' => StandardMediaDefinitions::class,
        ],
   
        // ...
    ];
   ```

7. **Install the npm required packages**

   ```bash
   npm i @numaxlab/atomic@^1.0.0
   npm i @tailwindcss/typography
   ```

8. **Setup your app.css and app.(ts|js) files**

   `app.css`:
   ```css
    @import '@numaxlab/atomic/src/css/atomic.css';
    @import '@numaxlab/atomic/src/css/icons.css';
    @import '../../vendor/numaxlab/testa/resources/css/testa.css';
    
    @plugin "@tailwindcss/typography";
    
    @source '../views/**/*.blade.php';
    @source '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php';
    @source '../../vendor/numaxlab/atomic-laravel/resources/views/*.blade.php';
    @source '../../vendor/numaxlab/testa/resources/views/components/**/*.blade.php';
    @source '../../vendor/numaxlab/testa/resources/views/storefront/**/*.blade.php';
    @source '../../vendor/numaxlab/testa/resources/views/vendor/numaxlab-atomic/**/*.blade.php';
   ```

   `app.(ts|js)`:
   ```typescript
    import collapsible from '@numaxlab/atomic/src/js/components/collapsible';
    import lineClamp from '../../vendor/numaxlab/testa/resources/js/components/line-clamp';
    import horizontalScroll from '../../vendor/numaxlab/testa/resources/js/components/horizontal-scroll';
    
    Alpine.data('collapsible', collapsible);
    Alpine.data('lineClamp', lineClamp);
    Alpine.data('horizontalScroll', horizontalScroll);
   ```

## Configuration

## Testing

The package uses Pest for testing. You can run the tests using the following command:

```bash
composer test
```

Or

```bash
./vendor/bin/pest
```

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Authors

- Adrián Pardellas Blunier ([adrian@numax.org](mailto:adrian@numax.org))
- X. Carlos Hidalgo ([carlos@numax.org](mailto:carlos@numax.org))
