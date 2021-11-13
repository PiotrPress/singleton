# Singleton

This library is a [Singleton](https://en.wikipedia.org/wiki/Singleton_pattern) (anti)pattern implementation.

## Installation

```console
composer require piotrpress/singleton
```

## Usage

```php
require __DIR__ . '/vendor/autoload.php';

use PiotrPress\Singleton;

Singleton::instance();
```

## Requirements

PHP ^`7.4` version.

## License

[GPL3.0](license.txt)