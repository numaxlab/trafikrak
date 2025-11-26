# Trafikrak

Trafikrak is a Laravel library for the LunarPHP e-commerce platform. It provides a set of tools and functionalities to extend LunarPHP, including features for shipping, search integration with Meilisearch, and multi-language support.

## Installation

You can install the package via composer:

```bash
composer require numaxlab/trafikrak
```

## Usage

The service provider will be automatically registered.

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Trafikrak\TrafikrakServiceProvider" --tag="trafikrak-config"
```

## Contributing

Contributions are welcome. Please open an issue or submit a pull request.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
