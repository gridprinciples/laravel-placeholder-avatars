# Serve SVG avatars from your Laravel application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gridprinciples/laravel-placeholder-avatars.svg?style=flat-square)](https://packagist.org/packages/gridprinciples/laravel-placeholder-avatars)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/gridprinciples/laravel-placeholder-avatars/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/gridprinciples/laravel-placeholder-avatars/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/gridprinciples/laravel-placeholder-avatars/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/gridprinciples/laravel-placeholder-avatars/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/gridprinciples/laravel-placeholder-avatars.svg?style=flat-square)](https://packagist.org/packages/gridprinciples/laravel-placeholder-avatars)

This package gets you the BoringAvatar's Beam faces rendered in your Laravel application as SVGs.  They can be rendered via configurable URL or by direct usage of a Blade component.

## Installation

You can install the package via composer:

```bash
composer require gridprinciples/laravel-placeholder-avatars
```

## Usage

### Via URL

If you plan on rendering via URL, you must register it in your routes file:

```php
// routes/web.php
use GridPrinciples\PlaceholderAvatars\Facades\PlaceholderAvatars;

PlaceholderAvatars::route('face.svg');
```

By default, you can use query parameters to set the generation options.  For example:

```
/face.svg?name=JohnDoe&square=1
```

...would generate the same face every time ("JohnDoe" as the seed) in a square format.

If you want to dictate which options are used in generation, you can supply these options when adding the route:

```php
// routes/web.php
use GridPrinciples\PlaceholderAvatars\Facades\PlaceholderAvatars;

PlaceholderAvatars::route('face.svg', 
    // enforce a red color scheme
    colors: ['#440000', '#110000', '#CC0000'],

    // we are rendering an SVG so this doesn't matter much, but you can set the size
    size: 256,

    // force a circular avatar, a square will never be produced even if requested
    square: false,
);
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [BoringDesigners](https://github.com/boringdesigners/) - for making some really good open-source avatars
- [Spatie](https://github.com/spatie) - for a great package skeleton
- [Greg Brock](https://github.com/gbrock)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
