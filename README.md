# PayBreak SDK PHP v4

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Documentation

## Usage

### Composer

Require the SDK using composer:

`composer require paybreak/paybreak-sdk-php:^4.0`

### API Client Factory

To use the paybreak SDK, you'll need to implement the `ApiClientFactoryInterface`

See our example implementation in the [Basket Repository](https://github.com/PayBreak/basket/blob/master/app/Gateways/ApiClientFactory.php)

1. `composer require paybreak/paybreak-sdk-php:^4.0` // check if  `:^4.0` is working
2. // implement your `ApiClientFactoryInterface` with your configuration. we can giv a link to baske to show our implementation in Laravel
3. // show how to create instance of `Application`
4. // show how to use any of gateways

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email dev@paybreak.com instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/paybreak/paybreak-sdk-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/PayBreak/paybreak-sdk-php/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/paybreak/paybreak-sdk-php.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/paybreak/paybreak-sdk-php.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/paybreak/paybreak-sdk-php.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/paybreak/paybreak-sdk-php
[link-travis]: https://travis-ci.org/PayBreak/paybreak-sdk-php
[link-scrutinizer]: https://scrutinizer-ci.com/g/paybreak/paybreak-sdk-php/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/paybreak/paybreak-sdk-php
[link-downloads]: https://packagist.org/packages/paybreak/paybreak-sdk-php
