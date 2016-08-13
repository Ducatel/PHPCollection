# PHPCollection

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]
[![StyleCI][ico-style-ci]][link-style-ci]

This library adds some "standard" collections for PHP.

## Install

Via Composer

``` bash
$ composer require ducatel/php-collection
```

## Usage

``` php

$typedArray = new Ducatel\PHPCollection\TypedArray(SomeClass::class);
$typedArray[] = new SomeClass();
$typedArray[] = new SomeClass("x");
$typedArray[] = new SomeClass("y");
$typedArray[] = new PDO(); // FAIL



```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email david@ducatel.eu instead of using the issue tracker.

## Credits

- [David Ducatel][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/Ducatel/php-collection.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Ducatel/PHPCollection/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/Ducatel/PHPCollection.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/Ducatel/PHPCollection.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Ducatel/php-collection.svg?style=flat-square
[ico-style-ci]: https://styleci.io/repos/64783664/shield

[link-packagist]: https://packagist.org/packages/Ducatel/php-collection
[link-travis]: https://travis-ci.org/Ducatel/PHPCollection
[link-scrutinizer]: https://scrutinizer-ci.com/g/Ducatel/PHPCollection/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/Ducatel/PHPCollection
[link-downloads]: https://packagist.org/packages/Ducatel/PHPCollection
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
[link-style-ci]: https://styleci.io/repos/64783664
